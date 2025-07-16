<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;

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
    return view('frontend.index');
});
//backend routes
Route::view('/dashboard', 'backend.dashboard')->name('dashboard');
Route::view('/master', 'backend.layouts.master')->name('master');
Route::view('/backend/sidebar/table', 'backend.sidebar.table')->name('table');
Route::get('/users', [UserController::class, 'index'])->name('users.index');


Route::get('/settings', [SettingController::class, 'index'])->name('site.setting');
Route::post('/settings/update', [SettingController::class, 'update'])->name('site.setting.update');

// Authentication routes
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::view('/register', 'auth.register')->name('register');
// Route::view('/login', 'auth.login')->name('login');


//login Route
Auth::routes();
Route::view('/login', 'frontend.form.login')->name('form.login');
Route::post('/login', 'LoginController@login')->name('login');

//register Route 
Route::view('/register', 'frontend.form.register')->name('register');