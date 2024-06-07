<?php

use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\lapanganController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\KategoriLapanganController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PDFController;

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
    return view('index');
});

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session(['is_logged_in' => true, 'username' => $user->name, 'is_member' => $user->jenis_pelanggan === 'member']);

        return redirect()->intended('/');
    }

    return redirect('/login')->withErrors('Ada yang salah. Coba lagi');
});


Route::group(['middleware' => 'session_auth'], function () {
    //halaman dashboard
    Route::get('/admin_dashboard', [SessionController::class, 'admin'])->name('admin_dashboard');
    //CRUD Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/form_create', [ProductController::class, 'product_create'])->name('form_create');
    Route::post('/create', [ProductController::class, 'product_store'])->name('store_product');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('update_product');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');
    Route::get('/detail_produk/{id}', [ProductController::class, 'show_produk'])->name('detail_product');

    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::get('/purchase/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');

    // CRUD Lapangan
    Route::get('/lapangan', [lapanganController::class, 'lapangan'])->name('lapangan_index');
    Route::get('/lapangan_create', [lapanganController::class, 'lapangan_create'])->name('create_lapangan');
    Route::post('/lapangan_store', [lapanganController::class, 'lapangan_store'])->name('lapangan.store');
    Route::get('/lapangan/{id}/edit', [lapanganController::class, 'edit_lapangan'])->name('update_lapangan');
    Route::put('/lapangan/{id}', [lapanganController::class, 'update_lapangan'])->name('lapangan.update');
    Route::delete('/lapangan/destroy/{id}', [lapanganController::class, 'destroy_lapangan'])->name('lapangan.destroy');
    Route::get('/detail/{id}', [lapanganController::class, 'show_lapangan'])->name('detail_lapangan');

    Route::get('/booking-list', [BookingController::class, 'bookingList'])->name('booking_list');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/booking/not-approve/{id}', [BookingController::class, 'notApprove'])->name('booking.not_approve');
    Route::post('/booking/{id}/approve', [BookingController::class, 'approve'])->name('booking.approve');

    Route::get('/pengelola', [ManagerController::class, 'index'])->name('pengelola');
    Route::delete('/pengelola/{id}', [ManagerController::class, 'destroy_member'])->name('pengelola.destroy');
    Route::post('pengelola', [ManagerController::class, 'store'])->name('pengelola.store');
    
    Route::get('/pengguna', [MemberController::class, 'index'])->name('pengguna');

});



Route::group(['middleware' => 'auth.check'], function () {
    Route::get('/booking', [BookingController::class, 'info_booking'])->name('booking_info');
    Route::get('/booking/{id}/detail', [BookingController::class, 'showDetail'])->name('booking.detail');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::get('/book-now/{id_lapangan}', [BookingController::class, 'bookNow'])->name('book_now');

    Route::post('/submit-booking', [BookingController::class, 'submitBooking'])->name('submit_booking');

    Route::post('/beli-product/{id}', [ProductController::class, 'beli'])->name('beli.product');
    Route::get('/keranjang', [ProductController::class, 'keranjang'])->name('cart');
    Route::delete('/keranjang/{id}', [CheckoutController::class, 'hapus'])->name('keranjang.hapus');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::get('/jadwal', [BookingController::class, 'showJadwal'])->name('jadwal.index');
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
});



Route::get('/product_user', [ProductController::class, 'product_user'])->name('view_product');
Route::get('/produk/{id}', [ProductController::class, 'product_user_show'])->name('product_show');


Route::get('/login', [SessionController::class, 'form_login'])->name('login');
Route::get('/', [SessionController::class, 'index'])->name('index');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
Route::post('/index', [SessionController::class, 'validasi'])->name('home');




Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register_form', [RegisterController::class, 'store'])->name('form_registrasi');


Route::get('/lapangan_user', [lapanganController::class, 'lapangan_user'])->name('view_lapangan');
Route::get('/lapangan_user_show/{id}', [lapanganController::class, 'user_court_show'])->name('user_court_show');



// ==Lokasi==
Route::post('/lapangan/lokasi/tambah', [LokasiController::class, 'store'])->name('create_lokasi');
Route::get('/lapangan/{id}/edit', [LapanganController::class, 'edit_lapangan'])->name('update.lapangan');

Route::get('/lokasi/check-related-users/{id}', [LokasiController::class, 'checkRelatedUsers']);
Route::delete('/lokasi/{id}/destroy', [LokasiController::class, 'destroy_lokasi'])->name('lokasi.destroy');
Route::get('/lokasi/check-related-users/{id}', [LokasiController::class, 'checkRelatedUsers']);


Route::get('/lapangan/lokasi/{id}/edit', [LokasiController::class, 'edit_lokasi'])->name('update.lokasi');
Route::put('/lapangan/lokasi/{id}/update', [LokasiController::class, 'update_lokasi'])->name('update.lok');
Route::delete('/lapangan/lokasi/{id}/hapus', [LokasiController::class, 'destroy_lokasi'])->name('lokasi.destroy');



Route::get('/lapangan/lokasi/tambah', function () {
    return view('court.lokasi.lokasi_lapangan');
});

Route::get('/error403', function () {
    return view('errors.403');
});

Route::get('/error', [ErrorController::class, 'index403'])->name('error403');



// == Membership ==

Route::get('/membership/beli', [MembershipController::class, 'beliForm'])->name('membership.beli');
Route::post('/membership/beli', [MembershipController::class, 'beliMembership']);
Route::get('/membership/status', [MembershipController::class, 'statusMembership'])->name('membership.status');