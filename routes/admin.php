<?php


use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MerchantController;
use App\Http\Controllers\admin\ModsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('admin.index');
});


Route::middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('/', [DashboardController::class, 'HomeView'])->name('admincp.index');
    Route::resource('clients', ClientController::class);
    Route::resource('merchants', MerchantController::class);



    Route::get('profile',[AuthController::class, 'edit'])->name('adminProfile.edit');
    Route::put('profile/info',[AuthController::class, 'update'])->name('adminProfile.info');
    Route::put('profile/password',[AuthController::class, 'changePassword'])->name('adminProfile.password');


}); // End Router
