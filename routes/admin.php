<?php


use App\Http\Controllers\admin\ModsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('admin.index');
});


Route::middleware('auth')->group(function (){

   // Route::get('/', [HomeController::class, 'HomeView'])->name('admincp.index');


});
