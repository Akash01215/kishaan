<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CropRecommendationController;
use App\Http\Controllers\FertilizerSuggestionController;
use App\Http\Controllers\DiseaseReportController;


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

// Authenticated user routes
Route::middleware('role:user')->prefix('user')->group(function () {

    // Crop recommendation routes
    Route::get('/crop-form', [App\Http\Controllers\CropController::class, 'showForm'])->name('crop.form');
    Route::post('/crop-recommend', [App\Http\Controllers\CropController::class, 'recommend'])->name('crop.recommend');
    // Fertilizer Suggestion Routes
    Route::get('/fertilizer-suggestion', 'FertilizerController@showForm')->name('fertilizer.form');
    Route::post('/fertilizer-suggestion', 'FertilizerController@suggest')->name('fertilizer.suggest');
    // Disease Detection Routes
    Route::get('/disease-detection-form', [App\Http\Controllers\DiseaseController::class, 'form'])->name('disease.form');
    Route::post('/detect-disease', [App\Http\Controllers\DiseaseController::class, 'detect'])->name('disease.detect');
});
