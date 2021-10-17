<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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
    return view('home', [
        'jobs' => Job::with('city', 'company')->get()
    ]);
});

Route::get('user/create', [UserController::class, 'create'])->middleware('guest');
Route::post('user/create', [UserController::class, 'store'])->middleware('guest');

Route::get('session/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('session/logout', [SessionController::class, 'destroy'])->middleware('auth');