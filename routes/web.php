<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\democontroller;
use App\Http\Controllers\photocongtroller;



Route::get('/',[democontroller::class,'index']);
Route::get('/about','App\Http\Controllers\democontroller@about');
Route::resource('photo',photocongtroller::class);