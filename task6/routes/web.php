<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class , 'index']);
Route::get('/dashboard/products',[ProductsController::class,'index']);
Route::get('/dashboard/products/create',[ProductsController::class,'create']);
Route::post('/dashboard/products/create/store',[ProductsController::class,'store']);
Route::get('/dashboard/products/edit/{id}',[ProductsController::class ,'edit']);

