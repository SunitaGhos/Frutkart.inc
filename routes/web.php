<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\RateChartController;
use App\Http\Controllers\BuyerController;

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
    return redirect()->route('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','isSeller']], function(){
    Route::prefix('seller')->name('seller.')->group(function (){
        Route::get('/profile',[SellerController::class,'profile'])->name('profile');
        Route::post('/updateProfile',[SellerController::class,'updateProfile'])->name('update_profile');
        Route::resource('/rateChart', RateChartController::class);
    });
    
 
 });
 Route::group(['middleware' => ['auth','isBuyer']], function(){
    Route::prefix('buyer')->name('buyer.')->group(function (){
        
        Route::get('/sellerList', [BuyerController::class,'rateChart'])->name('rateChart');
        Route::get('/sellerProfile/{id}', [BuyerController::class,'viewSellerProfile'])->name('viewSellerProfile');
    });
    
 
 });




Auth::routes();
