<?php
namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\SupplyController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExecutiveController;
use App\Http\Controllers\backend\RequisitionController;

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

// Route::get('/', function () {
//     return view('master');
// });
Route::view('/', 'admin.master')->name('root');
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
// approved or rejected requisition 

// stock
Route::resource('stock', StockController::class);

// supply
Route::resource('supply', SupplyController::class);

// Role
Route::resource('role', RoleController::class);

// Using role controller to assign and store permissions under specific module
Route::controller(RoleController::class)->group(function () {
    Route::get('/assign_permision/{role_id}','assignPermission')->name('assign.permission');
    Route::post('/store_permision','storePermission')->name('store.permission');
    // for edit and update assigning permissions
    Route::get('/assign_permision/edit/{role_id}','editPermission')->name('edit.permission');
    Route::put('/assign_permision','updatePermission')->name('update.permission');
   
});

