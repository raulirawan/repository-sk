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

Route::get('/pdf', 'Admin\BerkasController@pdf')->name('berkas.pdf');


Route::get('/', 'Auth\LoginController@showLoginForm')->name('form.login');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('admin')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('jabatan', JabatanController::class);
        Route::resource('unit', UnitController::class);

        Route::get('/pergerakan/surat-keputusan', 'SuratKeputusanController@index')->name('surat.keputusan.index');
        Route::get('/pergerakan/surat-keputusan/create', 'SuratKeputusanController@create')->name('surat.keputusan.create');
        Route::post('/pergerakan/surat-keputusan', 'SuratKeputusanController@store')->name('surat.keputusan.store');

        Route::get('/berkas', 'BerkasController@index')->name('berkas.index');
        Route::put('/berkas/accept/{id}', 'BerkasController@accept')->name('berkas.accept');
        Route::put('/berkas/reject/{id}', 'BerkasController@reject')->name('berkas.reject');

        Route::get('/arsip', 'ArsipController@index')->name('arsip.index');
    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
