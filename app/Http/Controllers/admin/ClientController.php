<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{

    public function index()
    {
        return view('admin.clients.index');
    }


    public function create()
    {
        return view('admin.clients.create');
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
        $input['role_id'] = 1 ;
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        notify()->success('إضافة عضو جديد إلى الموقع', ' تم بنجاح');

        return redirect()->route('clients.index');
    } // End Store


    public function show($id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.show', ['client' => $client]);
    }


    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.edit', ['client' => $client]);
    }


    public function update(Request $request, User $client)
    {
        $data = $request->validate([
            'name'  => ['required'],
            'phone' => ['required'],
            'email' => ['required','email',"unique:users,email,$client->id"],
        ]);
        $client->update($data);
        $client->save();
        notify()->success('تعديل بيانات العضو في الموقع','تم بنجاح');
        return back();
    } // End update

}
