<?php

use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\{
  DashboardController,
  UserController,
  TransaksiController,
  DetailtransaksiController,
  MemberController,
  OutletController,
  PaketController
};

// login
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/simpanRegister', [AuthController::class, 'simpanRegister'])->name('simpanRegister');

Route::group(['middleware' => 'auth', 'checkRole:admin'], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::resource('/user', UserController::class);
  Route::get('/user/{id}/profile', [UserController::class, 'profile'])->name('user.profile');
  Route::post('/profile/{id}', [UserController::class, 'update'])->name('profile.update');
});

route::get('/detailtransaksi/data', [DetailtransaksiController::class, 'data'])->name('detailtransaksi.data');
route::resource('/detailtransaksi', DetailtransaksiController::class);

route::get('/transaksi/data', [TransaksiController::class, 'data'])->name('transaksi.data');
route::resource('/transaksi', TransaksiController::class);

route::get('/member/data', [MemberController::class, 'data'])->name('member.data');
route::resource('/member', MemberController::class);

route::get('/outlet/data', [OutletController::class, 'data'])->name('outlet.data');
route::resource('/outlet', OutletController::class);

route::get('/paket/data', [PaketController::class, 'data'])->name('paket.data');
route::resource('/paket', PaketController::class);