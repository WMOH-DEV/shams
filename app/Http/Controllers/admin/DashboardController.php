<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Order;
use App\Models\admin\Price;
use App\Models\admin\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function HomeView()
    {
    //    dd($this->salesEveryMonth());
        $sales = $this->salesEveryMonth();
        $offers = $this->pricesEveryMonth();
        $clientsCount = User::where('role_id', '1')->count();
        $merchantsCount = User::where('role_id', '2')->count();
        $ordersCount = Order::count();
        $pricesCount = Price::count();
        $lastRegisteredClients = User::where('role_id', '1')->latest('id')->take(5)->get();
        $lastOrders = Order::latest('id')->take(5)->get();

        return view('admin.index', compact('clientsCount',
            'merchantsCount',
            'lastRegisteredClients',
            'pricesCount',
            'offers',
            'ordersCount',
            'sales',
            'lastOrders'));

        // return view('admin.index');
    }


    public function salesEveryMonth()
    {
        $data = [];
        // Circle trough all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon object from the current year and the current month (equals 2019-01-01 00:00:00)
            $date = Carbon::create(date('Y'), $month);

            // Make a copy of the start date and move to the end of the month (e.g. 2019-01-31 23:59:59)
            $date_end = $date->copy()->endOfMonth();
//              It works too but i preferred the db row
//            $orders = Order::select('*')
//                // the creation date must be between the start of the month and the end of the month
//                ->where('created_at', '>=', $date)
//                ->where('created_at', '<=', $date_end)
//                ->count();

            $orders = DB::table('orders')
                ->select(DB::raw('Month(created_at) as month'), DB::raw('count(*) as total'))
                ->whereDate('created_at', '>=', $date)
                ->whereDate('created_at', '<=', $date_end)
                ->groupBy(DB::raw('month(created_at)'))
                ->count();

            // Save the count of transactions for the current month in the output array
            $data[$month] = $orders;

        }
        return json_encode($data);

    }


    public function pricesEveryMonth()
    {
        $data = [];
        // Circle trough all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon object from the current year and the current month (equals 2019-01-01 00:00:00)
            $date = Carbon::create(date('Y'), $month);

            // Make a copy of the start date and move to the end of the month (e.g. 2019-01-31 23:59:59)
            $date_end = $date->copy()->endOfMonth();
//              It works too but i preferred the db row
//            $orders = Order::select('*')
//                // the creation date must be between the start of the month and the end of the month
//                ->where('created_at', '>=', $date)
//                ->where('created_at', '<=', $date_end)
//                ->count();

            $offers = DB::table('prices')
                ->select(DB::raw('Month(created_at) as month'), DB::raw('count(*) as total'))
                ->whereDate('created_at', '>=', $date)
                ->whereDate('created_at', '<=', $date_end)
                ->groupBy(DB::raw('month(created_at)'))
                ->count();

            // Save the count of transactions for the current month in the output array
            $data[$month] = $offers;

        }
        return json_encode($data);

    }

}
