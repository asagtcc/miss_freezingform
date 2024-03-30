<?php

use App\Http\Controllers\FormController;
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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/sabahalsaelm', function () {
    return view('sabah');
});

Route::get('/hessahalmubarak', function () {
    return view('hessah');
});

Route::get('/mangaf', function () {
    return view('mangaf');
});

Route::post('store', [FormController::class, 'store'])->name('form.store');
