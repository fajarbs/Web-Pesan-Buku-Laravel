<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/barang',
    [App\Http\Controllers\BarangController::class, 'list']
);

Route::get(
    '/pesan',
    [App\Http\Controllers\PesanController::class, 'list']
);

Route::get(
    '/barang/{id}',
    [App\Http\Controllers\PesanController::class, 'list_barang']
);

Route::get(
    '/pesan/{id}',
    [App\Http\Controllers\PesanController::class, 'detail']
);