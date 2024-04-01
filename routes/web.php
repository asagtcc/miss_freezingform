<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\Front\Branches\BranchesController;
use App\Mail\FreezingMail;
use App\Models\Form;
use Illuminate\Support\Facades\Request;
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

Route::view('/', 'home');

Route::prefix('freez/form/{slug}')->controller(BranchesController::class)->group(function () {
    Route::get('/', 'freez_form')->name('branch.freez_form');
});
Route::post('store', [FormController::class, 'store'])->name('form.store');
