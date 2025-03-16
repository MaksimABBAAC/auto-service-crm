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

Route::get('/orders', [\App\Http\Controllers\OrdersControlller::class, 'index']);
Route::get('/order/{id}', [\App\Http\Controllers\OrdersControlller::class, 'show']);

Route::get('/works', [\App\Http\Controllers\WorksControlller::class, 'index']);
