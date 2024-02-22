<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikePhotoController;

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


Route::get('/', [PhotoController::class, 'home'])->name('home');

route::get('/logout', [LogoutController::class, 'logout'])->name('logout.process');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'processRegister'])->name('register.process');


Route::prefix('user')->name('user.')->middleware('role:user')->group( function() {

//like photo
Route::post('/like',[LikePhotoController::class, 'like'])->name('like');
Route::post('/unlike',[LikePhotoController::class, 'unlike'])->name('unlike');

//comment photo
Route::post('/comment',[CommentController::class, 'post'])->name('post');

//hapus postingan
Route::post('/hapus/{id}', [PhotoController::class, 'hapusPost'])->name('hapus.post');

//menampilkan profile orang lain
Route::get('/profile/{user_id}',[ProfilController::class, 'people'])->name('people');
//menampilkan foto di home
Route::get('/home', [PhotoController::class, 'home'])->name('home');
//menampilkan profil sendiri
Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
//ini route untuk edit data diri
Route::post('/update', [ProfilController::class, 'update'])->name('update');
//ini route untuk ganti poto profil
Route::post('/', [ProfilController::class, 'avatar'])->name('avatar');
//ini route untuk hapus poto profil
Route::post('/destroy', [ProfilController::class, 'hapus'])->name('hapus');

Route::get('/album',[AlbumController::class, 'index'])->name('album.index');
Route::get('/form',[AlbumController::class, 'form'])->name('album.form');
});


Route::controller(PhotoController::class)->middleware('auth')->name('photo.')
->group(function(){
    //menampilkan postingan
    Route::get('/photo {photo_id}', 'index')->name('index');
    //menampilkan tampilan form upload foto
    Route::get('/post', 'postPhoto')->name('post');
    //route proses post foto
    Route::post('/post', 'postPhotoProcess')->name('postProcess');
});







Route::prefix('admin')->name('admin.')->middleware('role:admin')->group( function() {
Route::get('/dashboardAdmin' ,[AdminController::class, 'index'])->name('index');
Route::get('/postingan' ,[AdminController::class, 'postingan'])->name('postingan');
});


