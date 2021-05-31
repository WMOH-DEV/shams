<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Order;
use App\Models\admin\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function getOrderQuotations(Order $order)
    {
        //dd($order);
        return view('admin.quotations.index', compact('order'));

    } // End getOrder

    public function show(Price $quotation)
    {
      //  dd($quotation->order->id);
        return view('admin.quotations.show', compact('quotation'));
    }
}
