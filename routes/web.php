<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryLogController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PemesanController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
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
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/login', function () {
    $data['page_title'] = "Login";
    return view('auth.login', $data);
})->name('user.login');

Route::get('/', function () {
    $data['page_title'] = "Login";
    return view('auth.login', $data);
})->name('user.login');

Route::get('/login-admin', function () {
    $data['page_title'] = "Login";
    return view('auth.login-admin', $data);
})->name('user.login-admin');

Route::get('/home',[homeController::class,'index'])->name('home');
Route::get('home/login',[loginController::class,'index']);

Route::get('register', [RegisterController::class, 'index'])->name('register');

// Route::get('loginPost2', [UserController::class,'index']);
Route::post('loginPost2', [UserController::class,'loginPost2'])->name('loginPost2');

// Route::post('loginPost2', [UserController::class, 'loginPost2'])->name('loginPost2');
// Route::get('loginPostAdmin', [UserController::class, 'index'])->name('loginPostAdmin');
Route::post('loginPostAdmin', [UserController::class, 'loginPostAdmin'])->name('loginPostAdmin');

// Route::middleware('auth:Admin')->group(function () {
    // Dashboard admin
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
    Route::get('home', [DashboardController::class, 'home'])->name('home');

    Route::get('merek-list', [MerekController::class, 'index'])->name('merek-list');
    Route::get('merek-create', [MerekController::class, 'create'])->name('merek-create');
    Route::post('merek-store', [MerekController::class, 'store'])->name('merek-store');
    Route::get('merek-edit/{id}', [MerekController::class, 'edit'])->name('merek-edit');
    Route::post('merek-update/{id}', [MerekController::class, 'update'])->name('merek-update');
    Route::get('merek-destroy/{id}', [MerekController::class, 'destroy'])->name('merek-destroy');

    Route::get('mobil-list', [MobilController::class, 'index'])->name('mobil-list');
    Route::get('mobil-create', [MobilController::class, 'create'])->name('mobil-create');
    Route::post('mobil-store', [MobilController::class, 'store'])->name('mobil-store');
    Route::get('mobil-edit/{id}', [MobilController::class, 'edit'])->name('mobil-edit');
    Route::post('mobil-update/{id}', [MobilController::class, 'update'])->name('mobil-update');
    Route::get('mobil-destroy/{id}', [MobilController::class, 'destroy'])->name('mobil-destroy');

    Route::get('jenis-pembayaran-list', [JenisPembayaranController::class, 'index'])->name('jenis-pembayaran-list');
    Route::get('jenis-pembayaran-create', [JenisPembayaranController::class, 'create'])->name('jenis-pembayaran-create');
    Route::post('jenis-pembayaran-store', [JenisPembayaranController::class, 'store'])->name('jenis-pembayaran-store');
    Route::get('jenis-pembayaran-edit/{id}', [JenisPembayaranController::class, 'edit'])->name('jenis-pembayaran-edit');
    Route::post('jenis-pembayaran-update/{id}', [JenisPembayaranController::class, 'update'])->name('jenis-pembayaran-update');
    Route::get('jenis-pembayaran-destroy/{id}', [JenisPembayaranController::class, 'destroy'])->name('jenis-pembayaran-destroy');


    Route::post('booking', [BookingController::class, 'booking'])->name('booking');
    Route::get('riwayat-pemesanan', [BookingController::class, 'index'])->name('riwayat-pemesanan');
    Route::get('booking-list', [BookingController::class, 'indexAdmin'])->name('booking-list');


    Route::get('pemesan-list', [PemesanController::class, 'index'])->name('pemesan-list');
    Route::get('pemesan-create', [PemesanController::class, 'create'])->name('pemesan-create');
    Route::post('pemesan-store', [PemesanController::class, 'store'])->name('pemesan-store');
    Route::get('pemesan-edit/{id}', [PemesanController::class, 'edit'])->name('pemesan-edit');
    Route::post('pemesan-update/{id}', [PemesanController::class, 'update'])->name('pemesan-update');
    Route::get('pemesan-destroy/{id}', [PemesanController::class, 'destroy'])->name('pemesan-destroy');

    Route::get('perjalanan-list', [PerjalananController::class, 'index'])->name('perjalanan-list');
    Route::get('perjalanan-create', [PerjalananController::class, 'create'])->name('perjalanan-create');
    Route::post('perjalanan-store', [PerjalananController::class, 'store'])->name('perjalanan-store');
    Route::get('perjalanan-edit/{id}', [PerjalananController::class, 'edit'])->name('perjalanan-edit');
    Route::post('perjalanan-update/{id}', [PerjalananController::class, 'update'])->name('perjalanan-update');
    Route::get('perjalanan-destroy/{id}', [PerjalananController::class, 'destroy'])->name('perjalanan-destroy');

    Route::get('pesanan-list', [PesananController::class, 'index'])->name('pesanan-list');
    Route::get('pesanan-create', [PesananController::class, 'create'])->name('pesanan-create');
    Route::post('pesanan-store', [PesananController::class, 'store'])->name('pesanan-store');
    Route::get('pesanan-edit/{id}', [PesananController::class, 'edit'])->name('pesanan-edit');
    Route::post('pesanan-update/{id}', [PesananController::class, 'update'])->name('pesanan-update');
    Route::get('pesanan-destroy/{id}', [PesananController::class, 'destroy'])->name('pesanan-destroy');

    // Master Data
     Route::get('master-data', function () {
        $data['page_title'] = 'Master Data';
        $data['breadcumb'] = 'Master Data';
        return view('master-data.index', $data);
    })->name('master-data.index');

    // Departement
    Route::resource('departements', DepartementController::class);

    // Users
    Route::patch('change-password', [UserController::class, 'changePassword'])->name('users.change-password');
    Route::resource('users', UserController::class)->except([
        'show'
    ]);;

    // History Log
    Route::resource('history-log', HistoryLogController::class)->except([
        'show', 'create', 'store', 'edit', 'update'
    ]);;

    // profilr edit
    Route::resource('profile', ProfileController::class)->except([
        'show','create', 'store'
    ]);;
    Route::patch('change-password-profile', [ProfileController::class, 'changePassword'])->name('profile.change-password');


// });

//Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/loginPostAdmin', [AdminController::class, 'adminGetProducts'])->name('admin.loginPostAdmin');
    Route::get('/loginPostAdmin/comments', [AdminController::class, 'adminGetProductsComments'])->name('admin.loginPostAdmin.comments');
    Route::delete('/loginPostAdmin/{id}', [AdminController::class, 'adminDeleteProducts'])->name('admin.loginPostAdmin.delete');
    Route::delete('/loginPostAdmin/comments/{id}', [AdminController::class, 'adminDeleteProductsComments'])->name('admin.loginPostAdmin.comments');
});
