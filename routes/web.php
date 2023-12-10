<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratKeluarController;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/',[LandingController::class,'index']);
    Route::get('/auth',[AuthController::class,'showLoginForm'])->name('auth');   //name auth=login
    Route::post('/auth',[AuthController::class,'login']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home',[HomeController::class,'index']);

    Route::resource('suratmasuks',SuratmasukController::class)->middleware('aksesUser:admin');
    Route::get('suratmasuks/{id}', 'SuratMasukController@show')->name('suratmasuks.show')->middleware('aksesUser:admin');
    Route::get('suratmasukimport',[SuratmasukController::class,'import'])->middleware('aksesUser:admin');
    Route::post('suratmasukimportproses',[SuratmasukController::class,'importproses'])->middleware('aksesUser:admin');
    Route::get('suratmasukpdf',[SuratmasukController::class,'exportpdf'])->middleware('aksesUser:admin');
    
    Route::resource('suratkeluars', SuratkeluarController::class)->middleware('aksesUser:admin');
    Route::get('suratkeluars/{id}', 'SuratKeluarController@show')->name('suratkeluars.show')->middleware('aksesUser:admin');
    Route::get('suratkeluarimport',[SuratkeluarController::class,'import'])->middleware('aksesUser:admin');
    Route::post('suratkeluarimportproses',[SuratkeluarController::class,'importproses'])->middleware('aksesUser:admin');
    Route::get('suratkeluarpdf',[SuratkeluarController::class,'exportpdf'])->middleware('aksesUser:admin');
    
    Route::get('/disposisi', [DisposisiController::class, 'index'])->middleware('aksesUser:pemimpin');;
    Route::get('/logout', [AuthController::class, 'logout']);
});
