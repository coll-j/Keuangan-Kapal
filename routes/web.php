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

Route::get('/', function () {
    return view('front.welcome');
});

Route::get('/login', function() {
    return view('front.login');
})->name('login');

Route::get('/register', function() {
    return view('front.register');
})->name('register');

Route::prefix('dashboard')->name('dashboard.')->group(function (){
    Route::get('/', 'App\Http\Controllers\Dashboard\IndexController@pageIndex')->name('index');
    Route::get('/profil_perusahaan', 'App\Http\Controllers\Dashboard\IndexController@pageProfilPerusahaan')->name('profil_perusahaan');
    Route::get('/data', 'App\Http\Controllers\Dashboard\IndexController@pageData')->name('data');
    Route::get('/neraca', 'App\Http\Controllers\Catatan\IndexController@pageNeraca')->name('neraca');
    Route::get('/anggaran', 'App\Http\Controllers\Catatan\IndexController@pageAnggaran')->name('anggaran');
    Route::get('/laba_rugi_kantor', 'App\Http\Controllers\Laporan\IndexController@pageLabaRugiKantor')->name('laba_rugi_kantor');
    Route::get('/laba_rugi_proyek', 'App\Http\Controllers\Laporan\IndexController@pageLabaRugiProyek')->name('laba_rugi_proyek');
    Route::get('/laba_rugi', 'App\Http\Controllers\Laporan\IndexController@pageLabaRugi')->name('laba_rugi');
});
