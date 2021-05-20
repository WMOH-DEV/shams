<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Order;
use App\Models\admin\Ticket;
use App\Models\admin\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{

    public function HomeView()
    {
//        $clientsCount = User::where('role_id','1')->count();
//        $merchantsCount = User::where('role_id','2')->count();
//        $ticketsCount = Ticket::count();
//        $ordersCount = Order::count();
//        $lastRegisteredClients = User::where('role_id','1')->latest('id')->take(5)->get();
//        $lastOrders = Order::latest('id')->take(5)->get();



        return view('admin.index');
    }
}
