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

Auth::routes();
Route::get('register/{token?}', [App\Http\Controllers\Auth\RegisterController::class, 'view'])->name('reg');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'view']);

// Route::post('add_akun_transaksi_kantor', 'AkunController@insertTransaksiKantor')->name('add_akun_transaksi_kantor');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profil_perusahaan', [App\Http\Controllers\DashboardController::class, 'pageProfilPerusahaan'])->name('profil_perusahaan');
Route::get('/data', [App\Http\Controllers\DashboardController::class, 'PageData'])->name('data');
Route::get('/anggaran', [App\Http\Controllers\CatatanController::class, 'pageAnggaran'])->name('anggaran');
Route::get('/neraca', [App\Http\Controllers\CatatanController::class, 'pageNeraca'])->name('neraca');
Route::get('/transaksi_proyek/{date_range?}', [App\Http\Controllers\CatatanController::class, 'pageTransaksiProyek'])->name('transaksi_proyek');
Route::get('/transaksi_kantor', [App\Http\Controllers\CatatanController::class, 'pageTransaksiKantor'])->name('transaksi_kantor');
Route::get('/hutang_piutang', [App\Http\Controllers\CatatanController::class, 'pageHutangPiutang'])->name('hutang_piutang');
Route::get('/gudang', [App\Http\Controllers\GudangController::class, 'index'])->name('gudang');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/users/update', [App\Http\Controllers\ProfileController::class,'update'])->name('users.update');

Route::get('/laba_rugi', [App\Http\Controllers\LaporanController::class, 'pageLabaRugi'])->name('laba_rugi');
Route::get('/laba_rugi_kantor', [App\Http\Controllers\LaporanController::class, 'pageLabaRugiKantor'])->name('laba_rugi_kantor');
Route::get('/laba_rugi_proyek', [App\Http\Controllers\LaporanController::class, 'pageLabaRugiProyek'])->name('laba_rugi_proyek');

// Route perusahaan
Route::post('create_perusahaan', [App\Http\Controllers\dashboard\PerusahaanController::class, 'insert'])->name('create_perusahaan');
Route::post('invite_anggota', [App\Http\Controllers\dashboard\PerusahaanController::class, 'invite'])->name('invite_anggota');
Route::post('acc_invite', [App\Http\Controllers\dashboard\PerusahaanController::class, 'acc_invite'])->name('acc_invite');
Route::post('rej_invite', [App\Http\Controllers\dashboard\PerusahaanController::class, 'rej_invite'])->name('rej_invite');
Route::post('edit_role', [App\Http\Controllers\dashboard\PerusahaanController::class, 'edit_role'])->name('edit_role');
Route::post('delete_member', [App\Http\Controllers\dashboard\PerusahaanController::class, 'delete_member'])->name('delete_member');

Route::post('create_gudang', [App\Http\Controllers\GudangController::class, 'create'])->name('create_gudang');

Route::post('form_neraca', [App\Http\Controllers\AkunController::class, 'addAkunNeraca'])->name('form_neraca');
Route::post('form_pemasok', [App\Http\Controllers\AkunController::class, 'addPemasok'])->name('form_pemasok');
Route::post('form_proyek', [App\Http\Controllers\AkunController::class, 'addProyek'])->name('form_proyek');
Route::post('form_transaksi_proyek', [App\Http\Controllers\AkunController::class, 'addAkunTransaksiProyek'])->name('form_transaksi_proyek');
Route::post('form_transaksi_kantor', [App\Http\Controllers\AkunController::class, 'addAkunTransaksiKantor'])->name('form_transaksi_kantor');

Route::get('/delete_neraca/{nama}', [App\Http\Controllers\AkunController::class, 'delAkunNeraca']);
Route::get('/delete_akun_kantor/{nama}', [App\Http\Controllers\AkunController::class, 'delAkunTransaksiKantor']);
Route::get('/delete_akun_proyek/{nama}', [App\Http\Controllers\AkunController::class, 'delAkunTransaksiProyek']);
Route::get('/delete_pemasok/{nama}', [App\Http\Controllers\AkunController::class, 'delPemasok']);
Route::get('/delete_proyek/{nama}', [App\Http\Controllers\AkunController::class, 'delProyek']);

Route::post('edit_neraca', [App\Http\Controllers\AkunController::class, 'editAkunNeraca'])->name('edit_neraca');
Route::post('edit_akun_proyek', [App\Http\Controllers\AkunController::class, 'editAkunTransaksiProyek'])->name('edit_akun_proyek');
Route::post('edit_akun_kantor', [App\Http\Controllers\AkunController::class, 'editAkunTransaksiKantor'])->name('edit_akun_kantor');
Route::post('edit_proyek', [App\Http\Controllers\AkunController::class, 'editProyek'])->name('edit_proyek');
Route::post('edit_pemasok', [App\Http\Controllers\AkunController::class, 'editPemasok'])->name('edit_pemasok');

// Route Catatan Transaksi Proyek
Route::post('create_transaksi_proyek', [App\Http\Controllers\Catatan\TransaksiProyekController::class, 'insert'])->name('create_transaksi_proyek');
Route::post('update_transaksi_proyek', [App\Http\Controllers\Catatan\TransaksiProyekController::class, 'edit'])->name('update_transaksi_proyek');
Route::post('delete_transaksi_proyek', [App\Http\Controllers\Catatan\TransaksiProyekController::class, 'delete'])->name('delete_transaksi_proyek');

// Route Anggaran
Route::post('update_anggaran', [App\Http\Controllers\Catatan\AnggaranController::class, 'edit'])->name('update_anggaran');

Route::post('add_transaksi_kantor', [App\Http\Controllers\TransaksiController::class, 'addTransaksiKantor'])->name('add_transaksi_kantor');
Route::get('/get_transaksi_proyek/{id}', [App\Http\Controllers\Catatan\TransaksiProyekController::class, 'getById']);
