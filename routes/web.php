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
    return view('welcome');
});

//========================================HOME
Route::get('/home', function () {
    return view('pages.home');
});

//========================================LIM2
Route::get('/lim2', function () {
    return view('pages.lim2');
});

//========================================LIM1
Route::get('/lim1', function () {
    return view('pages.lim1');
});

// ============================================================ LAYOUT
Route::get('/layout', function () 
{
    return view('layout.layout');
});

// ============================================================ ADMIN
Route::get('/layout-admin', [AdminController::class, 'home']);
Route::get('/login-admin', [AdminController::class, 'login_admin']);

Route::get('/admin/dashboard', [AdminController::class, 'home']);
Route::get('/admin/lim-1', [AdminController::class, 'lim_1']);
Route::get('/admin/lim-2', [AdminController::class, 'lim_2']);
Route::get('/admin/lim-2-detail', [AdminController::class, 'lim_2_detail']);
Route::get('/admin/add-user', [AdminController::class, 'add_user']);
Route::get('/admin/add-user-add', [AdminController::class, 'add_user_add']);