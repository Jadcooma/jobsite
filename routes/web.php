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

Route::get('/', [JobController::class, 'showAll']);

Route::get('user/create', [UserController::class, 'create'])->middleware('guest');
Route::post('user/create', [UserController::class, 'store'])->middleware('guest');

Route::get('session/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('session/logout', [SessionController::class, 'destroy'])->middleware('auth');

/**
 * Admin only
 */

// jobs

Route::get('admin/jobs', [JobController::class, 'manage'])->middleware('admin');
Route::get('admin/jobs/create', [JobController::class, 'create'])->middleware('admin');
Route::post('admin/jobs/create', [JobController::class, 'store'])->middleware('admin');
Route::get('admin/jobs/edit/{job}', [JobController::class, 'edit'])->middleware('admin');
Route::put('admin/jobs/update/{job}', [JobController::class, 'update'])->middleware('admin');
Route::delete('admin/jobs/delete/{job}', [JobController::class, 'delete'])->middleware('admin');

// companies
Route::get('admin/companies', [CompanyController::class, 'manage'])->middleware('admin');
Route::get('admin/companies/create', [CompanyController::class, 'create'])->middleware('admin');
Route::post('admin/companies/create', [CompanyController::class, 'store'])->middleware('admin');
Route::get('admin/companies/edit/{company}', [CompanyController::class, 'edit'])->middleware('admin');
Route::put('admin/companies/update/{company}', [CompanyController::class, 'update'])->middleware('admin');
Route::delete('admin/companies/delete/{company}', [CompanyController::class, 'delete'])->middleware('admin');

// cities
Route::get('admin/cities', [CityController::class, 'manage'])->middleware('admin');
Route::get('admin/cities/create', [CityController::class, 'create'])->middleware('admin');
Route::post('admin/cities/create', [CityController::class, 'store'])->middleware('admin');
Route::get('admin/cities/edit/{city}', [CityController::class, 'edit'])->middleware('admin');
Route::put('admin/cities/update/{city}', [CityController::class, 'update'])->middleware('admin');
Route::delete('admin/cities/delete/{city}', [CityController::class, 'delete'])->middleware('admin');