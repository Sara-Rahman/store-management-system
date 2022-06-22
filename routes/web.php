<?php
namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExecutiveController;
use App\Http\Controllers\backend\RequisitionController;
use App\Http\Controllers\backend\SupplyController;

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
// For backend
// Admin
Route::resource('admin', AdminController::class);

// Employee
Route::resource('employee', EmployeeController::class);

// Executive
Route::resource('executive', ExecutiveController::class);

// Item
Route::resource('item', ItemController::class);

// Requisition
Route::resource('requisition', RequisitionController::class);

// stock
Route::resource('stock', StockController::class);

// supply
Route::resource('supply', SupplyController::class);
