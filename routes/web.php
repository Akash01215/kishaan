<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;


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
// Frontend routes
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/index', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/register', 'RegisterController@register')->name('register');
Route::get('/register', 'RegisterController@showRegisterForm')->name('register.form');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




//admin routes
Route::middleware('role:admin')->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
  Route::get('/activity', [DashboardController::class, 'activityPage'])->name('backend.activity');
  Route::get('/display', [DashboardController::class, 'display'])->name('backend.display');
   Route::get('/activities', [ActivityController::class, 'index'])->name('backend.activities.index');
    Route::resource('crop-recommendations', 'CropRecommendationController');
    Route::resource('fertilizer-suggestions', 'FertilizerSuggestionController');
    Route::resource('disease-reports', 'DiseaseReportController');
    Route::resource('users', 'UserController');
   Route::get('/settings', [SettingController::class, 'index'])->name('site.setting');
   Route::post('/settings/update', [SettingController::class, 'update'])->name('site.setting.update');
});

// User routes
// Route::middleware('role:user')->prefix('user')->group(function () {
//     Route::get('/', 'LoginController@dashboarduser')->name('user.dashboard');
//     Route::get('crop-suggestion', 'UserCropController@index')->name('user.crops');
//     Route::get('fertilizer-suggestion', 'UserFertilizerController@index')->name('user.fertilizer');
//     Route::post('disease-report', 'UserDiseaseReportController@store')->name('user.report');
// });






//backend routes
// Route::view('/dashboard', 'backend.dashboard')->name('dashboard');
// Route::view('/master', 'backend.layouts.master')->name('master');
// Route::view('/backend/sidebar/table', 'backend.sidebar.table')->name('table');
// Route::get('/users', [UserController::class, 'index'])->name('users.index');






