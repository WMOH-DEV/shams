<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('models/des', [AdminController::class, 'modelsDelIndex']);
Route::post('models/des', [AdminController::class, 'modelsDel'])->name('models.del');

Route::get('controllers/des', [AdminController::class, 'controllersDelIndex']);
Route::post('controllers/des', [AdminController::class, 'controllersDel'])->name('controller.del');;
