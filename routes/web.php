<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::get('/pdf', 'Admin\BerkasController@pdf')->name('berkas.pdf');


Route::get('/', 'Auth\LoginController@showLoginForm')->name('form.login');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('admin', 'auth')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('jabatan', JabatanController::class);
        Route::resource('unit', UnitController::class);

        Route::get('/pergerakan/surat-keputusan', 'SuratKeputusanController@index')->name('surat.keputusan.index');
        Route::get('/pergerakan/surat-keputusan/create', 'SuratKeputusanController@create')->name('surat.keputusan.create');
        Route::post('/pergerakan/surat-keputusan', 'SuratKeputusanController@store')->name('surat.keputusan.store');

        Route::get('/berkas', 'BerkasController@index')->name('berkas.index');
        Route::get('/berkas/detail/{id}', 'BerkasController@detail')->name('berkas.detail');
        Route::put('/berkas/accept/{id}', 'BerkasController@accept')->name('berkas.accept');
        Route::put('/berkas/reject/{id}', 'BerkasController@reject')->name('berkas.reject');

        Route::get('/arsip', 'ArsipController@index')->name('arsip.index');


        Route::get('/berkas/pdf/{id}', 'BerkasController@pdf')->name('berkas.pdf');

        Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
        Route::post('/laporan', 'LaporanController@getLaporan')->name('laporan.get');

        Route::get('/ganti-password', 'PasswordController@index')->name('ganti-password.admin.index');
        Route::post('/ganti-password', 'PasswordController@updatePassword')->name('ganti-password.admin.update');
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::get('/berkas', 'BerkasController@index')->name('berkas.user.index');
        Route::get('/berkas/detail/{id}', 'BerkasController@detail')->name('berkas.detail.user');

        Route::get('/ganti-password', 'PasswordController@index')->name('ganti-password.index');
        Route::post('/ganti-password', 'PasswordController@updatePassword')->name('ganti-password.update');
        Route::get('/berkas/pdf/{id}', 'BerkasController@pdf')->name('berkas.user.pdf');
    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
