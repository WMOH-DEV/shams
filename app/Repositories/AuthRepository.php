<?php


namespace App\Repositories;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthRepository
{
    public function updateInformation($request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => ['bail', 'required', 'string', 'max:50'],
            'email' => ['bail', 'required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['bail', 'nullable', 'max:50' , 'min:6'],
            'city_id' => ['bail', 'required', 'exists:cities,id']
        ]);

        $user->update($data);
        $user->save();

        notify()->success(' تحديث البيانات الأساسية','تم بنجاح');

        return redirect()->back();
    }

    public function updatePassword($request)
    {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return back()->with('error','كلمة المرور الحالية غير صحيحة');
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return back()->with('error','لا يمكن أن تتطابق كلمة المرور الجديدة مع القديمة');
        }

        $request->validate([
            'old_password' => ['bail', 'required'],
            'password' => ['bail', 'required', 'confirmed', 'min:8']
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        notify()->success('تغيير كلمة مرور الحساب', 'تم بنجاح');
        return back();
    }
}
