<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
});

// untuk mengelompokkan route-route
Route::prefix('/medicine')->name('medicine.')->group(function () {
    Route::get('/data', [MedicineController::class, 'index'])->name('data');
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
    Route::get('/data/stok', [MedicineController::class, 'stockData'])->name('data.stock');
    Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
    Route::patch('/stock/update/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/data', [UserController::class, 'index'])->name('data');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});
// method get = memasukan ke database
// method patch = mengupdate ke database