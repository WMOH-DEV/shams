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

    public function viewOrder(Order $order)
    {
        $home = Setting::first();
        $orderNumber = $order->order_number;
        // $number = rand();
        QrCode::size(150)->generate("$orderNumber", public_path("qrcodes/$order->order_number.svg"));
        $order_date = $order->created_at;
        $hijri = Hijri::Date('l ، j F ، Y',$order_date);
        $data['hijri'] = $hijri;
        $pt_date = $order->ticket->date_party;
        $party_hijri = Hijri::Date('l ، j F ، Y', $pt_date);
        $data['party_hijri'] = Hijri::Date('l ، j F ، Y', $pt_date);
        $data['order']  = $order;
        $data['home']   = $home;
        $totalInArabic = Tafqeet::inArabic($order->total);
        $data['totalInArabic'] = $totalInArabic;

        Date::setLocale('ar');
        $data['date'] = Date::parse($order->ticket->date_party)->format('l j F Y');
        // return view('admin.orders.test', compact('order', 'home','hijri','totalInArabic','party_hijri'));

        $price = floatval($order->ticket->price);
        $price_without_vat = floatval($order->ticket->price_without_vat);
        $data['vat'] = $price - $price_without_vat;

        $pdf = PDF::loadView('admin.orders.ticket', $data);

        return $pdf->stream($order->order_number.".pdf");
    } // End view Order

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
        return view('admin.orders.show', compact('order'));

    }

} // End Controller
