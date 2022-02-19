<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(BackendController::class)->prefix('admin')->group(function(){
    Route::get('/','index')->name('admin.dashboard');
});
Route::resource('roles',RolesController::class);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
