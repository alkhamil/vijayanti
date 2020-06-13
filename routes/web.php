<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'LoginCtrl@index')->name('login.index');
Route::post('login', 'LoginCtrl@login_proses')->name('login.proses');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardCtrl@index')->name('dashboard.index');
    Route::get('/dashboard', 'DashboardCtrl@index')->name('dashboard.index');
    Route::get('/logout', 'LoginCtrl@logout')->name('logout');
});


