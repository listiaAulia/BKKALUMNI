<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\UserController;

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
    return view('Auth/login');
});

// Route::get('/landingpage', function () {
//     return view('landingpage.index');
// });
Route::get('/features', function () {
    return view('landingpage.features');
});
// Route::get('/pricing', function () {
//     return view('landingpage.pricing');
// });
Route::get('/blog', function () {
    return view('landingpage.blog');
});
Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/sidebar', function () {
    return view('admin.sidebar');
});



Auth::routes();
Route::get('landingpage',[UserController::class,'landingpage']);
Route::get('pricing',[UserController::class,'lowongan']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::get('alumni',[AlumniController::class,'show']);
    Route::get('alumni/add',[AlumniController::class,'add']);
    Route::post('alumni/create',[AlumniController::class,'create']);
    Route::post('alumni/store',[AlumniController::class,'store']);
    Route::get('alumni/edit/{id}',[AlumniController::class,'edit']);
    Route::get('alumni/delete/{id}',[AlumniController::class,'delete']);
    Route::post('alumni/update/{id}',[AlumniController::class,'update']);
    Route::get('alumni/destroy/{id}',[AlumniController::class,'destroy']);


    Route::get('perusahaan',[PerusahaanController::class,'show']);
    Route::get('perusahaan/add',[PerusahaanController::class,'add']);
    Route::post('perusahaan/create',[PerusahaanController::class,'create']);
    Route::get('perusahaan/delete/{id_perusahaan}',[PerusahaanController::class,'delete']);
    Route::get('perusahaan/edit/{id_perusahaan}',[PerusahaanController::class,'edit']);
    Route::post('perusahaan/update/{id_perusahaan}',[PerusahaanController::class,'update']);


    Route::get('lowongan',[LowonganController::class,'show']);
    Route::get('lowongan/add',[LowonganController::class,'add']);
    Route::post('lowongan/create',[LowonganController::class,'create']);
    Route::get('lowongan/delete/{id_loker}',[LowonganController::class,'delete']);
    Route::get('lowongan/edit/{id_loker}',[LowonganController::class,'edit']);
    Route::post('lowongan/update/{id_loker}',[LowonganController::class,'update']);
