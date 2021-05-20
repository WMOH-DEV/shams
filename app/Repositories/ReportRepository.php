<?php


namespace App\Repositories;


use App\Models\admin\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DB;

class ReportRepository
{
    public function usersMonthCount()
    {
        return User::select('*')
            ->where('role_id', '1')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

    }

    public function merchantsMonthCount()
    {
        return User::select('*')
            ->where('role_id', '2')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
    }

    public function ordersOfWeek()
    {

        $lastWeekOrdersData =  DB::table('orders')
            ->select(\Illuminate\Support\Facades\DB::raw('DAY(created_at) as day'), DB::raw('count(*) as total'))
            ->whereDate('created_at', '>=', Carbon::today()->subWeek())
            ->whereDate('created_at', '<=', Carbon::today())
            ->groupBy(DB::raw('DAY(created_at)') )
            ->get();

        $orderWeek = [];
        foreach ($lastWeekOrdersData as $item){
            array_push($orderWeek, $item->total);
        }

        return \GuzzleHttp\json_encode($orderWeek);

    }

    public function usersOfWeek()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $lastWeekUsersData =  DB::table('users')
            ->select(\Illuminate\Support\Facades\DB::raw('DAY(created_at) as day'), DB::raw('count(*) as total'))
            ->where('role_id', '1')
            ->whereDate('created_at', '>=', Carbon::today()->subWeek())
            ->whereDate('created_at', '<=', Carbon::today())
            ->groupBy(DB::raw('DAY(created_at)') )
            ->get();

        $usersWeek = [];
        foreach ($lastWeekUsersData as $item){
            array_push($usersWeek, $item->total);
        }

        return \GuzzleHttp\json_encode($usersWeek);
    }

    public function salesOfWeek()
    {

        $lastWeekSalesData =  DB::table('orders')
            ->select(\Illuminate\Support\Facades\DB::raw('DAY(created_at) as day'), DB::raw('sum(total) as total'))
            ->where('admin_status', 'تم الدفع')
            ->whereDate('created_at', '>=', Carbon::today()->subWeek())
            ->whereDate('created_at', '<=', Carbon::today())
            ->groupBy(DB::raw('DAY(created_at)') )
            ->get();

        $saleWeek = [];
        foreach ($lastWeekSalesData  as $item){
            array_push($saleWeek, $item->total);
        }

        return \GuzzleHttp\json_encode($saleWeek);
    }

}
