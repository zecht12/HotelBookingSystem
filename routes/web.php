<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::view('/fasilitas', 'fasilitas')->name('fasilitas');
Route::get('/about', function () {return view('about');})->name('about');
Route::view('/kamar', 'kamar')->name('kamar');
Route::get('/kamar/{id}', [FrontendController::class,'showKamar'])->name('kamar.detail');
Route::post('/kamar/{id}/checkout', [FrontendController::class,'checkout'])->name('kamar.checkout');


Route::group(['prefix'=>config('admin.path'),'namespace'=>'App\\Http\\Controllers',],function(){
    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');
    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/akun','AdminController@akun')->name('admin.akun');
        Route::put('/akun','AdminController@updateAkun');
        Route::group(['middleware'=>['can:role,"admin"']],function(){
            Route::resource('admin', 'AdminController');
            Route::resource('kamar', 'KamarController');
            Route::get('admin/create', 'AdminController@create')->name('admin.create');
            Route::post('admin/store', 'AdminController@store')->name('admin.store');
            Route::get('admin/{admin}/edit', 'AdminController@edit')->name('admin.edit');
            Route::put('admin/{admin}', 'AdminController@update')->name('admin.update');
            Route::get('invoices', [InvoiceController::class,'index'])->name('invoices.index');
            Route::post('invoices/{id}/cancel', [InvoiceController::class,'cancelOrder'])->name('invoices.cancel');
        });
    });
}
);
