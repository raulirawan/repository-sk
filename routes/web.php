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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('form.login');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('admin')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');
        Route::resource('karyawan', KaryawanController::class);
        Route::resource('jabatan', JabatanController::class);
    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
