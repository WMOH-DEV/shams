<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Role;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ModController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $mods = User::whereHas('role', function ($q) {
            $q->whereIn('id', ['3', '4']);
        })
            ->where('email', '!=', 'wmoh.mail+shams@gmail.com')
            ->paginate(10)
            ;
        // $data = User::with('roles')->orderBy('id','DESC')->paginate(5)->except(1);
        return view('admin.mods.index', compact('roles', 'mods'));
    }

    public function create()
    {
        $roles = Role::whereIn('id', ['3', '4'])->get();
        return view('admin.mods.create',compact('roles'));
    } // End create

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password',
            'role_id'   => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        notify()->success('إضافة مشرف جديد إلى الموقع', ' تم بنجاح');

        return redirect()->route('mods.index');
    } // End Store

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.mods.show',compact('user'));

    } // End Show


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::whereIn('id', ['3', '4', '1'])->get();
        //$userRole = $user->roles->pluck('name','name')->all(); // For multi roles
       // $userRole = $user->roles->pluck('name')->first();
        return view('admin.mods.edit',compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'role_id' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        notify()->success('تعديل بيانات المشرف','تم بنجاح');

        return redirect()->route('mods.index');
    }



    public function destroy($id)
    {
        User::find($id)->delete();

        notify()->success('حذف المشرف من الموقع','تم بنجاح');

        return redirect()->route('mods.index');
    }
}
