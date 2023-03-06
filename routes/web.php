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

  Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
  Route::resource('/user', UserController::class);
  Route::get('/user/{id}/profile', [UserController::class, 'profile'])->name('user.profile');
  Route::post('/profile/{id}', [UserController::class, 'update'])->name('profile.update');
});

Route::get('/detailtransaksi/data', [DetailtransaksiController::class, 'data'])->name('detailtransaksi.data');
Route::resource('/detailtransaksi', DetailtransaksiController::class);

Route::get('/transaksi/data', [TransaksiController::class, 'data'])->name('transaksi.data');
Route::resource('/transaksi', TransaksiController::class);

Route::get('/member/data', [MemberController::class, 'data'])->name('member.data');
Route::resource('/member', MemberController::class);

Route::get('/outlet/data', [OutletController::class, 'data'])->name('outlet.data');
Route::resource('/outlet', OutletController::class);

Route::get('/paket/data', [PaketController::class, 'data'])->name('paket.data');
Route::resource('/paket', PaketController::class);