<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\OrdersControlller::class, 'index']);

Route::get('/client/{id}', [\App\Http\Controllers\ClientsControlller::class, 'show']);
Route::prefix('/clients')->group(function () {
    Route::get('/', [\App\Http\Controllers\ClientsControlller::class, 'index'])->name('clients.index');
    Route::get('/create', [\App\Http\Controllers\ClientsControlller::class, 'create'])->name('clients.create');
    Route::post('/', [\App\Http\Controllers\ClientsControlller::class, 'store'])->name('clients.store');
});

Route::get('/master/{id}', [\App\Http\Controllers\MastersControlller::class, 'show']);
Route::prefix('masters')->group(function () {
    Route::get('/', [\App\Http\Controllers\MastersControlller::class, 'index'])->name('masters.index');
    Route::get('/create', [\App\Http\Controllers\MastersControlller::class, 'create'])->name('masters.create');
    Route::post('/', [\App\Http\Controllers\MastersControlller::class, 'store'])->name('masters.store');
});

Route::get('/orders', [\App\Http\Controllers\OrdersControlller::class, 'index'])->name('orders.index');
Route::get('/order/{id}', [\App\Http\Controllers\OrdersControlller::class, 'show']);

Route::post('/orders', [\App\Http\Controllers\OrdersControlller::class, 'store'])->name('orders.store')->middleware('auth');
Route::get('/orders/create', [\App\Http\Controllers\OrdersControlller::class, 'create'])->middleware('auth');
Route::put('/orders/{id}', [\App\Http\Controllers\OrdersControlller::class, 'update'])->name('orders.update')->middleware('auth');
Route::get('/orders/edit/{id}', [\App\Http\Controllers\OrdersControlller::class, 'edit'])->name('orders.edit')->middleware('auth');
Route::get('/orders/destroy/{id}', [\App\Http\Controllers\OrdersControlller::class, 'destroy'])->middleware('auth');

Route::get('/works', [\App\Http\Controllers\WorksControlller::class, 'index'])->name('works.index');
Route::get('/works/create', [\App\Http\Controllers\WorksControlller::class, 'create'])->name('works.create');
Route::post('/works', [\App\Http\Controllers\WorksControlller::class, 'store'])->name('works.store');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('auth');
Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
