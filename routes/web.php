<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardMerkController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\RatingController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ResetPasswordController;

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

Route::get('/', [FrontController::class, 'index']);
Route::get('/produk', [FrontController::class, 'produk']);
Route::get('/produk/{id}/detail', [FrontController::class, 'detail']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->middleware('auth');
Route::post('/keranjang/{produk:id}', [KeranjangController::class, 'store'])->middleware('auth');
Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'destroy'])->middleware('auth');
Route::post('/keranjang/{keranjang:id}/update', [KeranjangController::class, 'update'])->middleware('auth');
Route::get('/checkout/get_data', [PembayaranController::class, 'provinces'])->name('checkout.get_data')->middleware('auth');
Route::get('/checkout', [PembayaranController::class, 'checkout'])->middleware('auth');
Route::resource('/order', PembayaranController::class)->only(['index', 'show']);
Route::post('/checkout/cek_ongkir', [OngkirController::class, 'ongkir'])->middleware('auth');
Route::post('/checkout/charger', [PembayaranController::class, 'charger'])->name('checkout.charger')->middleware('auth');
Route::post('/daftarAlamat', [AlamatController::class, 'buatAlamat'])->middleware('auth');
Route::get('/pembayaran/{pembayaran}', [PembayaranController::class, 'pembayaran'])->middleware('auth');


Route::get('/admin', function () {
    return view('dashboard.index');
});

Route::get('/profil', [FrontController::class, 'profil'])->middleware('auth');
Route::post('/profil', [FrontController::class, 'updateProfil'])->middleware('auth');

Route::post('/cari', [FrontController::class, 'cari']);

Route::get('/pesanan', [StatusController::class, 'index'])->middleware('auth');
Route::get('/detailPesanan/{pembayaran}', [StatusController::class, 'detail'])->middleware('auth');
Route::get('/detailPesanan/hapus/{id}', [StatusController::class, 'hapus'])->middleware('auth');
Route::post('/batalUbah/{id}', [StatusController::class, 'batalUbah'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware(['guest'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/daftar', [DaftarController::class, 'index'])->middleware(['guest'])->name('daftar');
Route::post('/daftar', [DaftarController::class, 'store']);
Route::post('/updateDikirim/{pembayaran:id}', [StatusController::class, 'updatedikirim'])->middleware('auth');

Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('', [DashboardController::class, 'index']);
    Route::resource('produk', DashboardProdukController::class)->middleware(['auth', 'admin']);
    Route::resource('kategori', DashboardKategoriController::class)->middleware(['auth', 'admin']);
    Route::resource('merk', DashboardMerkController::class)->middleware(['auth', 'admin']);
    Route::get('/user', [DashboardController::class, 'user'])->middleware(['auth', 'admin']);
    Route::get('/editUser/{id}', [DashboardController::class, 'edit'])->middleware(['auth', 'admin']);
    Route::post('/updateUser/{id}', [DashboardController::class, 'update'])->middleware(['auth', 'admin']);
    Route::delete('/hapusUser/{id}', [DashboardController::class, 'hapusUser'])->middleware(['auth', 'admin']);
    Route::get('/pemesanan', [PembelianController::class, 'pemesanan'])->middleware(['auth', 'admin']);
    Route::get('/konfirmasi', [PembelianController::class, 'konfirmasi'])->middleware(['auth', 'admin']);
    Route::post('/updateKonfirmasi/{pembayaran:id}', [PembelianController::class, 'updatekonfirmasi'])->middleware(['auth', 'admin']);
    Route::get('/proses', [PembelianController::class, 'proses'])->middleware(['auth', 'admin']);
    Route::post('/updateProses/{pembayaran:id}', [PembelianController::class, 'updateproses'])->middleware(['auth', 'admin']);
    Route::get('/dikirim', [PembelianController::class, 'dikirim'])->middleware(['auth', 'admin']);
    Route::get('/selesai', [PembelianController::class, 'selesai'])->middleware(['auth', 'admin']);
    Route::get('/dibatalkan', [PembelianCont\roller::class, 'batal'])->middleware(['auth', 'admin']);
    Route::get('/detailPesanan/{pembayaran}', [PembelianController::class, 'detailPesanan'])->middleware(['auth', 'admin']);
    Route::get('/dibatalkan', [PembelianController::class, 'dibatalkan'])->middleware(['auth', 'admin']);
});

Route::get('/produk/{kategori:id}', [FrontController::class, 'produkKategori']);

Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);

Route::get('/pesanan/cetak_pdf/{id}', [PembayaranController::class, 'cetakSatu'])->middleware(['auth', 'admin']);

// * socialite auth
//  */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::get('/cekEmail', [ResetPasswordController::class, 'cek']);
Route::post('/reset', [ResetPasswordController::class, 'reset']);
