<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\UserNameController::class, 'show'])->name('all-data');
Route::get('/username', [App\Http\Controllers\UserNameController::class, 'index'])->name('username');
Route::post('/submit-data', [App\Http\Controllers\UserNameController::class, 'generate_string'])->name('submit-data');



