<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title'=>'Hello world']);
});

Route::get('/clients', [\App\Http\Controllers\ClientsControlller::class, 'index']);
Route::get('/client/{id}', [\App\Http\Controllers\ClientsControlller::class, 'show']);

Route::get('/masters', [\App\Http\Controllers\MastersControlller::class, 'index']);
Route::get('/master/{id}', [\App\Http\Controllers\MastersControlller::class, 'show']);

Route::get('/orders', [\App\Http\Controllers\OrdersControlller::class, 'index'])->name('orders.index');
Route::get('/order/{id}', [\App\Http\Controllers\OrdersControlller::class, 'show']);

Route::post('/orders', [\App\Http\Controllers\OrdersControlller::class, 'store'])->name('orders.store')->middleware('auth');
Route::get('/orders/create', [\App\Http\Controllers\OrdersControlller::class, 'create'])->middleware('auth');
Route::put('/orders/{id}', [\App\Http\Controllers\OrdersControlller::class, 'update'])->name('orders.update')->middleware('auth');
Route::get('/orders/edit/{id}', [\App\Http\Controllers\OrdersControlller::class, 'edit'])->name('orders.edit')->middleware('auth');
Route::get('/orders/destroy/{id}', [\App\Http\Controllers\OrdersControlller::class, 'destroy'])->middleware('auth');

Route::get('/works', [\App\Http\Controllers\WorksControlller::class, 'index']);

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('auth');
Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
