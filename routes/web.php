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

// Route::get('/login', function() {
//     return view('front.login');
// })->name('login');

Route::get('/register', function() {
    return view('front.register');
})->name('register');

Auth::routes();
// Route::post('add_akun_transaksi_kantor', 'AkunController@insertTransaksiKantor')->name('add_akun_transaksi_kantor');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profil_perusahaan', [App\Http\Controllers\DashboardController::class, 'pageProfilPerusahaan'])->name('profil_perusahaan');
Route::get('/data', [App\Http\Controllers\DashboardController::class, 'PageData'])->name('data');
Route::get('/anggaran', [App\Http\Controllers\CatatanController::class, 'pageAnggaran'])->name('anggaran');
Route::get('/neraca', [App\Http\Controllers\CatatanController::class, 'pageNeraca'])->name('neraca');
Route::get('/transaksi_proyek', [App\Http\Controllers\CatatanController::class, 'pageTransaksiProyek'])->name('transaksi_proyek');
Route::get('/transaksi_kantor', [App\Http\Controllers\CatatanController::class, 'pageTransaksiKantor'])->name('transaksi_kantor');
Route::get('/hutang_piutang', [App\Http\Controllers\CatatanController::class, 'pageHutangPiutang'])->name('hutang_piutang');
Route::get('/gudang', [App\Http\Controllers\GudangController::class, 'index'])->name('gudang');

Route::get('/laba_rugi', [App\Http\Controllers\LaporanController::class, 'pageLabaRugi'])->name('laba_rugi');
Route::get('/laba_rugi_kantor', [App\Http\Controllers\LaporanController::class, 'pageLabaRugiKantor'])->name('laba_rugi_kantor');
Route::get('/laba_rugi_proyek', [App\Http\Controllers\LaporanController::class, 'pageLabaRugiProyek'])->name('laba_rugi_proyek');

Route::post('create_perusahaan', [App\Http\Controllers\dashboard\PerusahaanController::class, 'insert'])->name('create_perusahaan');
Route::post('form_neraca', [App\Http\Controllers\AkunController::class, 'addAkunNeraca'])->name('form_neraca');
Route::post('form_pemasok', [App\Http\Controllers\AkunController::class, 'addPemasok'])->name('form_pemasok');
Route::post('form_proyek', [App\Http\Controllers\AkunController::class, 'addProyek'])->name('form_proyek');
Route::post('form_transaksi_proyek', [App\Http\Controllers\AkunController::class, 'addAkunTransaksiProyek'])->name('form_transaksi_proyek');
Route::post('form_transaksi_kantor', [App\Http\Controllers\AkunController::class, 'addAkunTransaksiKantor'])->name('form_transaksi_kantor');