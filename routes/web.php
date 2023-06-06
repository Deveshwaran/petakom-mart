<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\WorkerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


//Administrator
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
Route::get('/admin/product/add', [AdminController::class, 'addProduct'])->name('admin.addProduct');
Route::post('/admin/product/create', [AdminController::class, 'createProduct'])->name('admin.createProduct');
Route::post('/admin/product/addStock/{id}', [AdminController::class, 'addStock'])->name('admin.addStock');
Route::post('/admin/product/minusStock/{id}', [AdminController::class, 'minusStock'])->name('admin.minusStock');
Route::get('/admin/promotion', [AdminController::class, 'promotion'])->name('admin.promotion');
Route::post('/admin/promotion/{id}', [AdminController::class, 'setDiscount'])->name('admin.setDiscount');
Route::get('/admin/report', [AdminController::class, 'report'])->name('admin.report');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');


//Committee
Route::get('/committee', [CommitteeController::class, 'index'])->name('committee.home');
Route::get('/committee/inventory', [CommitteeController::class, 'inventory'])->name('committee.inventory');


//Worker
Route::get('/worker', [WorkerController::class, 'index'])->name('worker.home');
Route::get('/worker/inventory', [WorkerController::class, 'inventory'])->name('worker.inventory');
Route::get('/worker/product/add', [WorkerController::class, 'addProduct'])->name('worker.addProduct');
Route::post('/worker/product/create', [WorkerController::class, 'createProduct'])->name('worker.createProduct');
Route::post('/worker/product/addStock/{id}', [WorkerController::class, 'addStock'])->name('worker.addStock');
Route::post('/worker/product/minusStock/{id}', [WorkerController::class, 'minusStock'])->name('worker.minusStock');


