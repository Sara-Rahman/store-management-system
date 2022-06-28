<?php
namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ItemController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\SupplierController;
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
//     return view('admin.master');
// });
// for admin login
Route::get('/',[AdminController::class,'login'])->name('admin.login');
Route::post('/dologin',[AdminController::class,'doLogin'])->name('admin.dologin');
// route group with middleware
Route::group(['prefix'=>'admin','middleware'=>['auth:web,employee']],function(){
 // root url
Route::view('/home', 'admin.master')->name('root');
// for logout
Route::get('/logout',[AdminController::class,'logout'])->name('logout');


// For backend


// Employee
Route::resource('employee', EmployeeController::class);

// Executive
Route::resource('executive', ExecutiveController::class);

// Item
Route::resource('item', ItemController::class);

// Requisition
Route::resource('requisition', RequisitionController::class);
// approved and rejected requisition route in Requisition controller
Route::controller(RequisitionController::class)->group(function () {
    Route::get('/approved/{id}', 'approveRequisition')->name('approved');
    Route::get('/rejected/{id}', 'rejectRequisition')->name('rejected');
});

// stock
Route::resource('stock', StockController::class);

// supplier
Route::resource('supplier', SupplierController::class);

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
});
