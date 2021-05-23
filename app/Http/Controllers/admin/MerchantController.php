<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    public function index()
    {
        return view('admin.merchants.index');
    } // end index

    public function show($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('admin.merchants.show', ['merchant' => $merchant]);
    } // end show

    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id);
        return view('admin.merchants.edit', ['merchant' => $merchant]);
    } // end Edit

    public function update(Request $request, Merchant $merchant)
    {
        $data = $request->validate([
            'name'  => ['required'],
            'phone' => ['required'],
            'email' => ['required','email',"unique:users,email,$merchant->id"],
        ]);
        $merchant->update($data);
        $merchant->save();
        notify()->success('تعديل بيانات التاجر في الموقع','تم بنجاح');
        return back();
    } // End update


    public function create()
    {
        return view('admin.merchants.create');
    } // end create


    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password|min:8',
            'phone'     => 'required'
        ]);

        $input = $request->all();
        $input['role_id'] = 2 ;
        $input['password'] = Hash::make($input['password']);
        Merchant::create($input);
        notify()->success('إضافة تاجر جديد إلى الموقع', ' تم بنجاح');

        return redirect()->route('merchants.index');
    } // End Store


}
