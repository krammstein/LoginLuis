<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashController;

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

Route::get('/', [UserController::class, 'login'])->name('user.login');

Route::get('remember', [UserController::class, 'remember'])->name('user.remember');

Route::get('create', [UserController::class, 'create'])->name('user.create');

Route::post('store', [UserController::class, 'store'])->name('user.store');

Route::post('do-login', [UserController::class, 'doLogin'])->name('user.doLogin');

Route::get('/admin/dash', [DashController::class, 'index'])->name('user.dash');

Route::get('/admin/logout', [DashController::class, 'logout'])->name('user.logout');
