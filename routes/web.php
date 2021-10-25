<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', [JobController::class, 'showAll'])->name('home');

/**
 * Guest routing
 */

Route::middleware('guest')->group( function () {
    Route::get('user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('user/create', [UserController::class, 'store'])->name('user-store');
    
    Route::get('session/login', [SessionController::class, 'create'])->name('user-login');
    Route::post('session/login', [SessionController::class, 'store'])->name('user-store');
});

/**
 * User routing
 */
Route::middleware('auth')->group( function () {
    Route::post('session/logout', [SessionController::class, 'destroy'])->name('session-destroy');    
});

/**
 * Admin only
 */

Route::middleware('admin')->group( function() {
    // job
    Route::get('admin/job', [JobController::class, 'manage'])->name('job-manage');
    Route::get('admin/job/create', [JobController::class, 'create'])->name('job-create');
    Route::post('admin/job/create', [JobController::class, 'store'])->name('job-store');
    Route::get('admin/job/edit/{job}', [JobController::class, 'edit'])->name('job-edit');
    Route::put('admin/job/update/{job}', [JobController::class, 'update'])->name('job-update');
    Route::delete('admin/job/delete/{job}', [JobController::class, 'delete'])->name('job-delete');

    // company
    Route::get('admin/company', [CompanyController::class, 'manage'])->name('company-manage');
    Route::get('admin/company/create', [CompanyController::class, 'create'])->name('company-create');
    Route::post('admin/company/create', [CompanyController::class, 'store'])->name('company-store');
    Route::get('admin/company/edit/{company}', [CompanyController::class, 'edit'])->name('company-edit');
    Route::put('admin/company/update/{company}', [CompanyController::class, 'update'])->name('company-update');
    Route::delete('admin/company/delete/{company}', [CompanyController::class, 'delete'])->name('company-delete');

    // city
    Route::get('admin/city', [CityController::class, 'manage'])->name('city-manage');
    Route::get('admin/city/create', [CityController::class, 'create'])->name('city-create');
    Route::post('admin/city/create', [CityController::class, 'store'])->name('city-store');
    Route::get('admin/city/edit/{city}', [CityController::class, 'edit'])->name('city-edit');
    Route::put('admin/city/update/{city}', [CityController::class, 'update'])->name('city-update');
    Route::delete('admin/city/delete/{city}', [CityController::class, 'delete'])->name('city-delete');
});