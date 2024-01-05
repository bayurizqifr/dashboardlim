<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WitelController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\NamaPelatihanController;
use App\Http\Controllers\TrainingFeedbackController;
use App\Http\Controllers\TrainingEvaluationController;

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

//========================================LIM1
Route::get('/lim1', [UserPageController::class, 'lim1']);
//========================================LIM2
Route::get('/lim2', [UserPageController::class, 'lim2']);


//========================================FORM FEEDBACK
Route::get('/form-feedback', [UserPageController::class, 'form_feedback_page']);
Route::post('/form-feedback-upload', [UserPageController::class, 'form_feedback_upload']);

// ============================================================ USERADMIN
Route::post('/login', [UserAdminController::class, 'login_useradmin_cek']);
Route::get('/login', [UserAdminController::class, 'login_useradmin']);
Route::get('/logout', [UserAdminController::class, 'logout']);

// ============================================================ UPLOAD
Route::middleware(UserMiddleware::class)->group(function () {
    Route::get('/upload', [UserAdminController::class, 'upload']);
    Route::get('/upload-detail', [UserAdminController::class, 'upload_detail']);
    Route::resource('/upload', TrainingEvaluationController::class)->except(['index']);
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
    Route::post('/admin/lim-2-detail', [AdminController::class, 'lim_2_detail']);
    Route::post('/admin/lim-2-delete', [AdminController::class, 'lim_2_delete']);
    Route::get('/admin/add-user', [AdminController::class, 'add_user']);
    Route::resource('/admin/add-user', UserController::class)->except(['index']);
    Route::get('/admin/add-pelatihan', [AdminController::class, 'add_pelatihan']);
    Route::post('/admin/add-pelatihan-csv-upload', [AdminController::class, 'add_pelatihan_csv_upload']);
    Route::resource('/admin/add-pelatihan', NamaPelatihanController::class)->except(['index']);
    Route::get('/admin/add-region', [AdminController::class, 'add_region']);
    Route::resource('/admin/add-region', RegionController::class)->except(['index']);
    Route::get('/admin/add-witel', [AdminController::class, 'add_witel']);
    Route::resource('/admin/add-witel', WitelController::class)->except(['index']);
});