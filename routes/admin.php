<?php


use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MerchantController;
use App\Http\Controllers\admin\ModsController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PriceController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Livewire\Quotation;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('admin.index');
});


Route::middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('/', [DashboardController::class, 'HomeView'])->name('admincp.index');
    Route::resource('clients', ClientController::class);
    Route::resource('merchants', MerchantController::class);
    Route::resource('orders', OrderController::class)->except('create', 'store');
    Route::get('orders/{order}/quotations', [PriceController::class,'getOrderQuotations'])->name('quotations.show');

//    Quotation
    Route::get('quotations/{quotation}', [PriceController::class, 'show'])->name('quotations.show.one');

    Route::get('profile',[AuthController::class, 'edit'])->name('adminProfile.edit');
    Route::put('profile/info',[AuthController::class, 'update'])->name('adminProfile.info');
    Route::put('profile/password',[AuthController::class, 'changePassword'])->name('adminProfile.password');

    Route::resource('pages', PageController::class);
    Route::get('settings',[SettingController::class,'index'])->name('settings.index');
    Route::put('settings',[SettingController::class,'update'])->name('settings.update');
}); // End Router
