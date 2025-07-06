<?php

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
Route::view('/dashboard', 'backend.dashboard')->name('dashboard');
Route::view('/master', 'backend.layouts.master')->name('master');


Route::view('/backend/sidebar/table', 'backend.sidebar.table')->name('table');
