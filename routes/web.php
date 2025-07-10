<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
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
//Route::view('/backend/setting/form', 'backend.setting.form')->name('site.settings.form');
//site settings routes


Route::get('/settings', [SettingController::class, 'index'])->name('site.setting');
Route::post('/settings/update', [SettingController::class, 'update'])->name('site.setting.update');
