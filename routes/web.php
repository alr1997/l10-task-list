<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return view('index', [
        'name' => 'Alisa'
    ]);
});

Route::get('/hello', function () {
    return 'Hello';
});

Route:: get('/greet/{name}', function ($name) {
    return 'Hello '.$name;
});

Route::fallback(function () {
    return "still got somewhere";
});
