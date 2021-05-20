<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{

    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function edit()
    {
        $user = User::findOrfail(Auth::user()->id);
        return view('admin.profile.edit', compact('user'));
    } // End edit

    public function update(Request $request)
    {
        return $this->authRepository->updateInformation($request);
    }

    public function changePassword(Request $request)
    {
       return $this->authRepository->updatePassword($request);
    } // End changePassword
}
