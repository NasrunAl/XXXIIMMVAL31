<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicCarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::get('/', [PublicCarController::class, 'index'])->name('home');
Route::get('/car/{slug}', [PublicCarController::class, 'show'])->name('car.show');
Route::post('/car/{id}/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/admin/login', [AdminAuthController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.post');
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('cars', AdminCarController::class);
    Route::get('orders', [\App\Http\Controllers\Admin\OrderController::class,'index'])->name('orders.index');
});
