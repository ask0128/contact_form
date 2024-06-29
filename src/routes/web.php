<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\InquiryController;
use  App\Http\Controllers\AuthController;
use  App\Http\Controllers\AdminController;
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

Route::middleware('auth')->group(function () {
     Route::get('/admin', [AuthController::class, 'index'])->name('index');
 });
Route::get('/', [InquiryController::class, 'show'])->name('show');
Route::post('/confirm', [InquiryController::class, "confirm"])->name('confirm');
Route::post('/thanks', [InquiryController::class, "thanks"])->name('thanks');
Route::post('/search', [AdminController::class, "search"])->name('search');
