<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKlinikController;
use App\Http\Controllers\AdminUtamaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TempatTidurController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class, 'index'])->name('home');
Route::get('/klinik',[IndexController::class, 'klinik'])->name('klinik');
Route::get('/klinik/detile/{clinic}',[IndexController::class, 'klinikDetile'])->name('klinikDetile');
Route::get('/klinik/kamar/detile/{clinic}/{room}',[IndexController::class, 'kamarDetile'])->name('kamarDetile');
Route::get('/search',[IndexController::class, 'search'])->name('search');



Route::group(['middleware' => ['auth', 'checkrole:Admin Utama']], function () {
   
    // Admin Utama
    Route::get('/admin-utama', [AdminUtamaController::class, 'index'])->name('adminUtama');
    Route::get('/admin-utama/edit/{id}', [AdminUtamaController::class, 'editUser'])->name('editUser');
    Route::put('/admin-utama/update/{id}', [AdminUtamaController::class, 'updateUser'])->name('updateUser');
    Route::delete('/admin-utama/delete/{id}', [AdminUtamaController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/admin-utama/table-klinik', [AdminUtamaController::class, 'klinik'])->name('tableKlinik');
    Route::get('/admin-utama/index-table', [AdminUtamaController::class, 'kliniks'])->name('indextable');
    Route::get('/admin-utama/create-account', [AdminUtamaController::class, 'create'])->name('createAccount');
    Route::post('/admin-utama/create-account', [AdminUtamaController::class, 'store1'])->name('createProsses');
    Route::get('/admin-utama/add-clinic', [AdminUtamaController::class, 'user'])->name('user');
    Route::get('/admin-utama/add-clinic-user/{id}', [AdminUtamaController::class, 'addClinic'])->name('clinicCreate');
    Route::post('/admin-utama/clinic/store', [AdminUtamaController::class, 'store'])->name('clinicStore');
});

Route::group(['middleware' =>['auth', 'checkrole:Admin Klinik']], function () {
    // Admin Klinik 
    Route::get('/admin-klinik', [AdminKlinikController::class, 'index'])->name('adminKlinik');
    Route::get('/admin-klinik/{id}/edit', [AdminKlinikController::class, 'edit'])->name('editKlinik');
    Route::put('/admin-klinik/{id}/update', [AdminKlinikController::class, 'update'])->name('updateKlinik');

    // Kamar
    Route::get('/admin-klinik-kamar', [KamarController::class, 'index'])->name('tableKamar');
    Route::get('/admin-klinik/kamar/add', [KamarController::class, 'create'])->name('tambahKamar');
    Route::post('/admin-klinik/kamar/add/add', [KamarController::class, 'store'])->name('prossesTambahKamar');
    Route::get('/admin-klinik/kamar/{id}/edit', [KamarController::class, 'edit'])->name('editKamar');
    Route::put('/admin-klinik/kamar/{id}/update', [KamarController::class, 'update'])->name('prossesEditKamar');
    Route::delete('/admin-klinik/kamar/{id}/delete', [KamarController::class, 'destroy'])->name('deleteKamar');

    // Tempat Tidur
    Route::get('/admin-klinik/kamar/Tempat-Tidur', [TempatTidurController::class, 'index'])->name('tableTempatTidur');
    Route::get('/admin-klinik/kamar/Tempat-Tidur/{id}/add', [TempatTidurController::class, 'create'])->name('tambahTempatTidur');
    Route::post('/admin-klinik/kamar/Tempat-Tidur/{id}/add-prosses', [TempatTidurController::class, 'store'])->name('prossesTambahTempatTidur');
    Route::get('/admin-klinik/kamar/Tempat-Tidur/{id}/edit', [TempatTidurController::class, 'edit'])->name('editTempatTidur');
    Route::put('/admin-klinik/kamar/Tempat-Tidur/{id}/prosses', [TempatTidurController::class, 'update'])->name('putBed');
    Route::delete('/admin-klinik/kamar/Tempat-Tidur/{id}/delete', [TempatTidurController::class, 'destroy'])->name('deleteTempatTidur');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('');


