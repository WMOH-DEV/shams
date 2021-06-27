<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\City;
use App\Models\admin\Merchant;
use App\Models\admin\Order;
use App\Models\admin\Price;
use App\Models\admin\User;
use App\Repositories\ReportRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected ReportRepository $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
//       / dd($this->reportRepository->usersOfWeek());
        $currentMonthUsers = $this->reportRepository->usersMonthCount();
        $currentMonthMerchants = $this->reportRepository->merchantsMonthCount();
        $totalOrders = Order::count();
   //     $tickets = Ticket::count();
//        $sales = Order::whereNotNull('accepted_price')->count();
        $sales = Order::whereHas('prices', function ($q) {
            $q->where('isAccepted', true);
        })->count();
//        $debits = Order::whereNull('accepted_price')->count();
        $debits = Order::whereHas('prices', function ($q) {
            $q->where('isAccepted', false);
        })->count();
       // dd($debits);
        $rushOrders = Order::where('delivery','مستعجل')->count();
        $confirmedMerchants = Merchant::where('role_id','2')
            ->where('certified', '1')
            ->count();
        $unConfirmedMerchants = Merchant::where('role_id','2')
            ->where('certified', 0)
            ->count();
        $totalAcceptedPrices = Price::where('isAccepted', '!=', '0')->count();
        $totalPrices = Price::count();
        $totalUsers = User::where('role_id', 1)->count();
        $totalMerchants = User::where('role_id', 2)->count();
        $totalUsersHasOrders = User::has('orders')->count();
        $totalMerchantsHasPrices = Merchant::where('role_id', 2)->has('prices')->count();


        return view('admin.reports.index', compact('currentMonthUsers',
            'totalOrders',
            'totalUsers',
            'totalPrices',
            'rushOrders',
            'totalMerchants',
            'totalAcceptedPrices',
            'confirmedMerchants',
            'unConfirmedMerchants',
            'totalUsersHasOrders',
            'totalMerchantsHasPrices',
            'totalOrders',
            'debits',
            'sales',
            'currentMonthMerchants'));
    }

    public function statisticsAjax(Request $request)
    {
        if ($request->ajax()) {
        return $this->reportRepository->ordersOfWeek();
        }
        return 'No allowed';
    }

    public function usersAjax(Request $request)
    {
        if ($request->ajax()) {
            return $this->reportRepository->usersOfWeek();
        }
        return 'No allowed';
    }


    public function merchantsAjax(Request $request)
    {
        if ($request->ajax()) {
            return $this->reportRepository->merchantsOfWeek();
        }
        return 'No allowed';
    }



}
