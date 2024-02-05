<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\Login;

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

Route::get('/', function () {
    return view('index');
});

//user sudah login tidak akan bisa akses halaman login
Route::middleware(['guest'])->group(function(){
        //login
        Route::get('/login' , 'App\Http\Controllers\TabelController@Login')->name('login');
        //loginAuth
        Route::post('/login' , [UserController::class, 'Login']);
});

//supaya halaman admin/userr tidak bisa di akses tanpa login
Route::middleware(['auth'])->group(function(){
    //Log Out
    Route::get('/logout' , [UserController::class, 'Logout']);
    //halaman awal admin
    Route::get('/admin' , [AdminController::class, 'index']);
    Route::get('/admin/edit-profile/{id}' , [AdminController::class, 'editprof']);
    Route::post('/admin/update' , [AdminController::class, 'update']);
    Route::get('/admin/manage-buku' , [AdminController::class, 'mbuku']);
    Route::get('/admin/manage-buku/delete/{id}' , [AdminController::class, 'delbuku']);
    Route::get('/admin/manage-buku/edit/{id}' , [AdminController::class, 'editbook']);
    Route::post('/admin/manage-buku/edit/update' , [AdminController::class, 'updatebook']);
    Route::get('/admin/manage-buku/add/' , [AdminController::class, 'add']);
    Route::post('/admin/manage-buku/addbook' , [AdminController::class, 'addbook']);
    Route::get('/admin/manage-karyawan' , [AdminController::class, 'mkaryawan']);
    Route::get('/admin/manage-karyawan/add' , [AdminController::class, 'mkadd']);
    Route::post('/admin/manage-karyawan/add/added' , [AdminController::class, 'addkar']);
    Route::get('/admin/list-peminjam' , [AdminController::class, 'lpinjam']);

    // halaman user
    Route::get('/dashboard' , [AdminController::class, 'index']);
    Route::get('/dashboard/edit-profile/{id}' , [AdminController::class, 'editprof']);
    Route::post('/dashboard/update' , [AdminController::class, 'update']);
    Route::get('/dashboard/pinjam-buku' , 'App\Http\Controllers\PenggunaController@pinjam');
    Route::get('/dashboard/pinjam-buku/shw/{id}' , 'App\Http\Controllers\PenggunaController@shwpinjam');
    Route::post('/dashboard/pinjam-buku/shw/add' , 'App\Http\Controllers\PenggunaController@addpinjam');
    Route::get('/dashboard/jadwal-pinjam/{id}' , 'App\Http\Controllers\PenggunaController@jwlpinjam');
    Route::get('/delete/{id}' , 'App\Http\Controllers\PenggunaController@delete');
    
});

//redirect untuk semua akses ke home
Route::get('/home',function(){
    return redirect('/');
});


//index
Route::get('/' , 'App\Http\Controllers\TabelController@index');

//register
Route::get('/register' , 'App\Http\Controllers\TabelController@register');
Route::post('/register' , [UserController::class, 'register']);
Route::get('/blog' , 'App\Http\Controllers\TabelController@blog');
Route::get('/about-us' , 'App\Http\Controllers\TabelController@about');
Route::get('/perpus' , 'App\Http\Controllers\TabelController@perpus');




//Route::post('/LoginAuth', [UserController::class, 'Login']);//->name('login.check');