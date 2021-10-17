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

Route::get('admin/jobs/manage', [JobController::class, 'manage'])->middleware('admin');
Route::get('admin/jobs/create', [JobController::class, 'create'])->middleware('admin');

Route::get('admin/companies/manage', [CompanyController::class, 'manage'])->middleware('admin');

Route::get('admin/cities/manage', [CityController::class, 'manage'])->middleware('admin');