<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/katalog', [FrontendController::class, 'katalog'])->name('frontend.katalog');
Route::get('/produk/{id}', [FrontendController::class, 'detail'])->name('frontend.detail');
Route::get('/keranjang', [FrontendController::class, 'keranjang'])->name('frontend.keranjang');
Route::post('/keranjang/tambah/{id}', [FrontendController::class, 'tambahKeranjang'])->name('frontend.tambahKeranjang');
Route::post('/keranjang/update/{id}', [FrontendController::class, 'updateKeranjang'])->name('frontend.updateKeranjang');
Route::delete('/keranjang/hapus/{id}', [FrontendController::class, 'hapusKeranjang'])->name('frontend.hapusKeranjang');

Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/checkout', [FrontendController::class, 'prosesCheckout'])->name('frontend.prosesCheckout');
Route::get('/sukses/{kode}', [FrontendController::class, 'sukses'])->name('frontend.sukses');

Route::get('/login', [LoginController::class, 'loginFrontend'])->name('frontend.login');
Route::post('/login', [LoginController::class, 'authenticateFrontend'])->name('frontend.login.submit');
Route::get('/register', [LoginController::class, 'registerFrontend'])->name('frontend.register');
Route::post('/register', [LoginController::class, 'storeRegisterFrontend'])->name('frontend.register.submit');
Route::post('/logout', [LoginController::class, 'logoutFrontend'])->name('frontend.logout');
Route::get('backend/beranda', [BerandaController::class, 'berandaBackend'])->name('backend.beranda')->middleware('auth');

Route::redirect('/backend', '/backend/beranda');

Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');

Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');

Route::post('backend/logout', [LoginController::class, 'logoutBackend'])->name('backend.logout');
// Route::resource('backend/user', UserController::class)->middleware('auth');
Route::resource('backend/user', UserController::class, ['as' => 'backend'])->middleware('auth');

Route::resource('backend/kategori', KategoriController::class, ['as' => 'backend'])->middleware('auth');

Route::resource('backend/produk', ProdukController::class, ['as' => 'backend'])->middleware('auth');
// Route untuk menambahkan foto
Route::post('foto-produk/store', [ProdukController::class, 'storeFoto'])->name('backend.foto_produk.store')->middleware('auth');
// Route untuk menghapus foto
Route::delete('foto-produk/{id}', [ProdukController::class, 'destroyFoto'])->name('backend.foto_produk.destroy')->middleware('auth');

Route::get('backend/laporan/formuser', [UserController::class, 'formUser'])->name('backend.laporan.formuser')->middleware('auth');
Route::post('backend/laporan/cetakuser', [UserController::class, 'cetakUser'])->name('backend.laporan.cetakuser')->middleware('auth');

Route::get('backend/laporan/formproduk', [ProdukController::class, 'formProduk'])->name('backend.laporan.formproduk')->middleware('auth');
Route::post('backend/laporan/cetakproduk', [ProdukController::class, 'cetakProduk'])->name('backend.laporan.cetakproduk')->middleware('auth');

Route::get('backend/transaksi', [TransaksiController::class, 'index'])->name('backend.transaksi.index')->middleware('auth');
Route::get('backend/transaksi/{id}', [TransaksiController::class, 'show'])->name('backend.transaksi.show')->middleware('auth');
Route::put('backend/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('backend.transaksi.updateStatus')->middleware('auth');
Route::delete('backend/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('backend.transaksi.destroy')->middleware('auth');

Route::get('backend/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('backend.laporan_penjualan.index')->middleware('auth');
Route::get('backend/laporan-penjualan/cetak', [LaporanPenjualanController::class, 'cetak'])->name('backend.laporan_penjualan.cetak')->middleware('auth');
Route::get('backend/laporan-penjualan/excel', [LaporanPenjualanController::class, 'exportExcel'])->name('backend.laporan_penjualan.excel')->middleware('auth');

Route::get('backend/chatbot', [ChatbotController::class, 'index'])->name('backend.chatbot.index')->middleware('auth');
Route::post('backend/chatbot/chat', [ChatbotController::class, 'chat'])->name('backend.chatbot.chat')->middleware('auth');