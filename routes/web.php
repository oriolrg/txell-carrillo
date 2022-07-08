<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicBotigaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Administra\AdministraProductesBotigaController;
use App\Http\Controllers\Administra\AdministraComandesBotigaController;
use App\Http\Controllers\Administra\AdministraCategoriesBotigaController;
use App\Http\Controllers\ContactaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagamentController;

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
Auth::routes();
/**
 * Public routes
 */
Route::get('/', function () {
    return view('public.welcome');
});

Route::post('/contacta/email', [ContactaController::class, 'email']);
Route::get('/home', function () {
    return view('public.welcome');
});
/**
* Botiga routes
*
**/
Route::group(['prefix'=>'botiga','as'=>'botiga.'], function(){
    Route::get('/', function () {
        return view('public.welcome');
    });
    Route::get('/', [PublicBotigaController::class, 'index']);
     /** 
      * Cart routes
     */
    Route::group(['prefix'=>'cart','as'=>'cart.'], function(){
        Route::get('/', [CartController::class, 'cartList'])->name('list');
        Route::post('/', [CartController::class, 'addToCart'])->name('store');
        Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update');
        Route::post('/remove', [CartController::class, 'removeCart'])->name('remove');
        Route::post('/clear', [CartController::class, 'clearAllCart'])->name('clear');
        Route::post('/pagar', [PagamentController::class, 'pagarCart'])->name('pagar');
    });
});
/**
 * Admin routes
 */
Route::group(['prefix'=>'administra','as'=>'administra.'], function(){
    Route::resource('/', AdministraProductesBotigaController::class);
    Route::group(['prefix'=>'comandes','as'=>'comandes.'], function(){
        Route::get('/', [AdministraComandesBotigaController::class,'getComandes']);
        Route::get('/pendents', [AdministraComandesBotigaController::class,'getComandesPendents'])->name('pendents');
        Route::get('/{id}/tramitat', [AdministraComandesBotigaController::class,'setComandaTramitada']);
        Route::get('/tramitades', [AdministraComandesBotigaController::class,'getComandesTramitades'])->name('tramitades');
        Route::delete('/{id}/delete', [AdministraComandesBotigaController::class,'delete']);
    });
    Route::group(['prefix'=>'categories','as'=>'categories.'], function(){
        Route::resource('/', AdministraCategoriesBotigaController::class);
        Route::get('/{id}/edit', [AdministraCategoriesBotigaController::class,'edit']);
        Route::post('/{id}/update', [AdministraCategoriesBotigaController::class,'update']);
        Route::delete('/{id}/delete', [AdministraCategoriesBotigaController::class,'delete']);
    });
    Route::group(['prefix'=>'productes','as'=>'categories.'], function(){
        Route::resource('/', AdministraProductesBotigaController::class);
        Route::get('/{id}/edit', [AdministraProductesBotigaController::class,'edit']);
        Route::post('/{id}/update', [AdministraProductesBotigaController::class,'update']);
        Route::delete('/{id}/delete', [AdministraProductesBotigaController::class,'delete']);
        Route::get('/{id}', [AdministraProductesBotigaController::class, 'getProducte']);
    });
});
