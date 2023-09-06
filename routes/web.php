<?php

// use auth;
// use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LolosController;
use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\User\LengkapiController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\WawancaraController;
use App\Models\Wawancara;

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

Route::get('/', [FrontController::class,'index'])->name('front');

Route::get('/informasi',[FrontController::class,'informasi'])->name('informasi');

Route::get('/about-us',[FrontController::class,'about'])->name('about');

Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/login', [AdminController::class,'index'])->name('index');

    Route::post('login/proses', [AdminController::class,'login'])->name('login');
    // Route::get('/register',[AdminController::class,'show'])->name('show');
    // Route::post('register/proses', [AdminController::class,'register'])->name('register');
    Route::get('/logout', [AdminController::class,'logout'])->name('logout');

    // dashboard admin
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    });

    // article dashboard
    Route::get('/article' , [ArticleController::class,'index'])->name('article.index');

    Route::get('/article/create', [ArticleController::class,'create'])->name('article.create');
      
    Route::post('/articles/create/proses', [ArticleController::class,'store'])->name('article.store');
      
    Route::get('/articles/edit/{slug}', [ArticleController::class,'edit'])->name('article.edit');
      
    Route::put('/articles/update/{slug}', [ArticleController::class,'update'])->name('article.update');

    Route::get('/articles/{id}', [ArticleController::class,'show'])->name('article.show');

    Route::delete('/articles/delete/{id}', [ArticleController::class, 'destroy'])->name('article.delete');

    // category dashboard
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');

    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');

    Route::post('/category/create/process',[CategoryController::class,'store'])->name('category.store');

    Route::put('/category/edit/process/{id}',[CategoryController::class,'update'])->name('category.update');

    Route::delete('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.destroy');

    // pendaftar
    Route::get('/pendaftar',[PendaftarController::class,'index'])->name('pendaftar.index');

    Route::post('/pendaftar/verify/{id}',[PendaftarController::class,'verify'])->name('pendaftar.verify');
    
    Route::get('/pendaftar/create',[PendaftarController::class,'create'])->name('pendaftar.create');
    
    Route::post('/pendaftar/process',[PendaftarController::class,'store'])->name('pendaftar.store');

    Route::get('/pendaftar/edit/{id}',[PendaftarController::class,'edit'])->name('pendaftar.edit');
    
    Route::put('/pendaftar/update/{id}',[PendaftarController::class,'update'])->name('pendaftar.update');
   
    Route::get('/pendaftar/show/{id}',[PendaftarController::class,'show'])->name('pendaftar.show');

    Route::get('/pendaftar/document/{id}',[PendaftarController::class,'show_document'])->name('pendaftar.show_document');

    Route::delete('/pendaftar/delete/{id}',[PendaftarController::class,'destroy'])->name('pendaftar.destroy');

    // peserta
    Route::get('/peserta',[PesertaController::class,'index'])->name('peserta.index');

    Route::get('/peserta/edit/{id}',[PesertaController::class,'edit'])->name('peserta.edit');

    Route::put('/peserta/process/{id}',[PesertaController::class,'update'])->name('peserta.update');

    Route::get('/peserta/delete/{id}',[PesertaController::class,'destroy'])->name('peserta.destroy');

    Route::get('/peserta/show/{id}',[PesertaController::class,'show'])->name('peserta.show');

    // wawancara
    Route::get('/wawancara',[WawancaraController::class,'index'])->name('wawancara.index');

    Route::post('/wawancara/{id}',[WawancaraController::class,'store'])->name('wawancara.create');

    Route::put('/wawancara/update/{id}',[WawancaraController::class,'update'])->name('wawancara.update');

    Route::delete('/wawancara/delete/{id}',[WawancaraController::class,'delete'])->name('wawancara.delete');
    // siswa yang Lolos
    Route::get('/peserta/lolos',[LolosController::class,'index'])->name('lolos.index');

    Route::get('/peserta/lolos/edit/{id}',[LolosController::class,'edit'])->name('lolos.edit');

    Route::put('/peserta/lolos/process/{id}',[LolosController::class,'update'])->name('lolos.update');

    Route::delete('/peserta/lolos/delete/{id}',[LolosController::class,'destroy'])->name('lolos.destroy');

    Route::post('/peserta/pengecekan/{id}',[LolosController::class,'pengecekan'])->name('pengecekan');

    // profile admin
    Route::get('/profile',[SettingController::class,'profile'])->name('setting.profile.index');

    Route::put('/profile/edit',[SettingController::class,'update_profile'])->name('setting.profile.update');

    // notify setting
    Route::get('/notify',[NotifyController::class,'index'])->name('setting.notify.index');

    Route::put('/notify/update',[NotifyController::class,'update'])->name('setting.notify.update');
    
    Route::get('/settings',[SettingController::class,'general'])->name('settings.general');

    Route::put('/settings/update', [SettingController::class,'update_general'])->name('settings.update_general');

    // document
    Route::resource('/document',DocumentController::class);
    
  });
    
Route::prefix('/user')->name('user.')->group(function(){

    Route::get('/apa', function(){ 
      return view('front.index');
    });
    Route::get('/verification', [UserController::class, 'verifyEmail'])->name('verification');

    Route::post('/verification/resend-email-verification', [UserController::class, 'resendEmailVerification'])->name('resend-email-verification');

    Route::get('/verification/success/{token}', [UserController::class, 'verifyEmailProcess'])->name('verification.process');
    //login register

    Route::get('/login', [UserController::class,'index'])->name('index');

    Route::post('/login/proses', [UserController::class,'login'])->name('login');

    Route::get('/register',[UserController::class,'show'])->name('show');

    Route::post('/register/proses', [UserController::class, 'registerProcess'])->name('register.proses');

    Route::get('/logout', [UserController::class,'logout'])->name('logout');

    // kode otp
    Route::get('/activication',[UserController::class,'activication'])->name('activication');

    Route::post('/activication/process',[UserController::class,'activication_process'])->name('activication.process');

    Route::middleware(['auth','role:user'])->group(function(){
        Route::get('/dashboard', [UserDashboardController::class,'index'])->name('dashboard');
        Route::get('/profile',[UserDashboardController::class,'profile'])->name('profile');
        Route::get('/informasi',[UserDashboardController::class,'informasi'])->name('informasi');
        Route::get('/detail-informasi/{slug}',[FrontController::class,'detail_informasi'])->name('informasi.detail');
        Route::get('/kelengkapan' ,[LengkapiController::class,'index'])->name('kelengkapan');
        Route::post('/kelengkapan/process' ,[LengkapiController::class,'store'])->name('kelengkapan.process');
        Route::get('/document',[LengkapiController::class,'document'])->name('document');
        Route::post('/document/process',[LengkapiController::class,'upload'])->name('document.process');
      });
});
