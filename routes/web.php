<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//Route::get('/admin/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
//Route::post('/admin/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::resource('/admin/users', UserController::class)->middleware(['auth','check.is.admin']);
Route::resource('/posts', PostController::class)->middleware('auth');
