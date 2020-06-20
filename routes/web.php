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

    Route::get('/user', 'UserCtrl@index')->name('user.index');
    Route::post('/user/tambah', 'UserCtrl@tambah')->name('user.tambah');
    Route::post('/user/edit', 'UserCtrl@edit')->name('user.edit');
    Route::get('/user/hapus/{id}', 'UserCtrl@hapus')->name('user.hapus');

    Route::get('/perusahaan', 'PerusahaanCtrl@index')->name('perusahaan.index');
    Route::post('/perusahaan/tambah', 'PerusahaanCtrl@tambah')->name('perusahaan.tambah');
    Route::post('/perusahaan/edit', 'PerusahaanCtrl@edit')->name('perusahaan.edit');
    Route::get('/perusahaan/hapus/{id}', 'PerusahaanCtrl@hapus')->name('perusahaan.hapus');

    Route::get('/checker', 'CheckerCtrl@index')->name('checker.index');
    Route::post('/checker/tambah', 'CheckerCtrl@tambah')->name('checker.tambah');
    Route::post('/checker/edit', 'CheckerCtrl@edit')->name('checker.edit');
    Route::get('/checker/hapus/{id}', 'CheckerCtrl@hapus')->name('checker.hapus');

    Route::get('/assignment', 'AssignmentCtrl@index')->name('assignment.index');
    Route::post('/assignment/tambah', 'AssignmentCtrl@tambah')->name('assignment.tambah');
    Route::get('/assignment/hapus/{id}', 'AssignmentCtrl@hapus')->name('assignment.hapus');
    
    Route::get('/dimensi', 'DimensiCtrl@index')->name('dimensi.index');
    Route::post('/dimensi/tambah', 'DimensiCtrl@tambah')->name('dimensi.tambah');
    Route::post('/dimensi/edit', 'DimensiCtrl@edit')->name('dimensi.edit');
    Route::get('/dimensi/hapus/{id}', 'DimensiCtrl@hapus')->name('dimensi.hapus');

    Route::get('/kriteria', 'KriteriaCtrl@index')->name('kriteria.index');
    Route::post('/kriteria/tambah', 'KriteriaCtrl@tambah')->name('kriteria.tambah');
    Route::post('/kriteria/edit', 'KriteriaCtrl@edit')->name('kriteria.edit');
    Route::get('/kriteria/hapus/{id}', 'KriteriaCtrl@hapus')->name('kriteria.hapus');
    
    Route::get('/kuisioner', 'KuisionerCtrl@index')->name('kuisioner.index');

    Route::get('/logout', 'LoginCtrl@logout')->name('logout');
});


