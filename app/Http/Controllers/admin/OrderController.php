<?php

namespace App\Http\Controllers\admin;

use Alkoumi\LaravelArabicTafqeet\Tafqeet;
use Alkoumi\LaravelHijriDate\Hijri;
use App\Models\admin\Order;
use App\Models\admin\Setting;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    } // End index


    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'admin_status' => ['bail', 'required', 'regex:/^(تم الدفع|لم يتم الدفع)$/']
        ]);

        $order->update($data);
        notify('حفظ البيانات', 'تم بنجاح');

        return redirect(route('orders.index'));
    } // End update

    public function show(Order $order)
    {

        $previous = $this->getPrevious($order);
        $next = $this->getNext($order);
        $accepted = Order::
            whereHas('prices', function ($q){
           $q->where('isAccepted', true);
        })->where('id', $order->id)
            ->first();
       // dd($accepted);
        return view('admin.orders.show', compact('order','accepted', 'previous', 'next'));

    }

    public function getPrevious(Order $order)
    {
        return $order->id !== Order::first()->id ?
           Order::where('id', '<', $order->id)->orderBy('id', 'DESC')->first() : null;
    }

    public function getNext(Order $order)
    {
        return $order->id !== Order::latest('id')->first()->id ?
            Order::where('id', '>', $order->id)->orderBy('id', 'ASC')->first() : null;
    }


} // End Controller
