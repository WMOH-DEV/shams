<?php


use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MerchantController;
use App\Http\Controllers\admin\ModController;
use App\Http\Controllers\admin\OpinionController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PriceController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('profile', [AuthController::class, 'edit'])->name('adminProfile.edit');
    Route::put('profile/info', [AuthController::class, 'update'])->name('adminProfile.info');
    Route::put('profile/password', [AuthController::class, 'changePassword'])->name('adminProfile.password');

    Route::resource('opinions', OpinionController::class)->except('create', 'store');

    Route::resource('mods', ModController::class);
    Route::resource('pages', PageController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

    Route::get('statisticsAjax', [ReportController::class, 'statisticsAjax'])->name('orders.ajax');
    Route::get('usersAjax', [ReportController::class, 'usersAjax'])->name('users.ajax');
    Route::get('merchantsAjax', [ReportController::class, 'merchantsAjax'])->name('sales.ajax');

    Route::resource('clients', ClientController::class);
    Route::resource('merchants', MerchantController::class);
    Route::resource('orders', OrderController::class)->except('create', 'store');


    Route::get('/clear-cache',function(){
        \Artisan::call('cache:clear');
        \Artisan::call('view:cache');
        \Artisan::call('view:clear');

        echo "cash cleared";

        return back();
    });

}); // End Router


Route::middleware(['auth', 'isMod'])->group(function () {

    Route::get('/', [DashboardController::class, 'HomeView'])->name('admincp.index');
    Route::resource('clients', ClientController::class)->except('create', 'store', 'delete');
    Route::resource('merchants', MerchantController::class)->except('create', 'store', 'delete');
    Route::resource('orders', OrderController::class)->except('create', 'store', 'delete');
    Route::get('orders/{order}/quotations', [PriceController::class, 'getOrderQuotations'])->name('quotations.show');

//    Quotation
    Route::get('quotations/{quotation}', [PriceController::class, 'show'])->name('quotations.show.one');

});
