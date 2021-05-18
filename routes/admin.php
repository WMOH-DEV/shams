<?php


use App\Http\Controllers\admin\ModsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('admin.index');
});

//Route::view('dashboard', 'dashboard')
//	->name('dashboard')
//	->middleware(['auth', 'verified']);

//Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
//	Route::view('profile', 'profile.show');
//});

Route::middleware('auth')->group(function (){

   // Route::get('/', [HomeController::class, 'HomeView'])->name('admincp.index');

    Route::resource('roles', RoleController::class);
    Route::resource('mods', ModsController::class);

});
