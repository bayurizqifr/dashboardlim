<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\TrainingFeedbackController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

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

// ============================================================ USERADMIN
Route::post('/login', [UserAdminController::class, 'login_useradmin_cek']);
Route::get('/login', [UserAdminController::class, 'login_useradmin']);

// ============================================================ UPLOAD
Route::middleware(UserMiddleware::class)->group(function () {
    Route::get('/upload', [UserAdminController::class, 'home']);
});




// ============================================================ LAYOUT
Route::get('/layout', function () 
{
    return view('layout.layout');
});

// ============================================================ ADMIN
Route::get('/login-admin', [AdminController::class, 'login_admin']);
Route::post('/login-admin', [AdminController::class, 'login_admin_cek']);
Route::get('/logout-admin', [AdminController::class, 'logout_admin']);

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'home']);
    Route::get('/admin/lim-1', [AdminController::class, 'lim_1']);
    Route::resource('/admin/lim-1', TrainingFeedbackController::class)->except(['index']);
    Route::get('/admin/lim-2', [AdminController::class, 'lim_2']);
    Route::get('/admin/lim-2-detail', [AdminController::class, 'lim_2_detail']);
    Route::get('/admin/add-user', [AdminController::class, 'add_user']);
    Route::resource('/admin/add-user', UserController::class)->except(['index']);
});