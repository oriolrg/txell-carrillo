<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicBotigaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Administra\AdministraProductesBotigaController;
use App\Http\Controllers\Administra\AdministraComandesBotigaController;
use App\Http\Controllers\Administra\AdministraCategoriesBotigaController;

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
    return view('public.welcome');
});
Route::get('/botiga', function () {
    return view('public.welcome');
});
Route::get('/botiga', [PublicBotigaController::class, 'index']);
//Route::resource('/cart', 'CartController');
//Route::get('/resume/cart', 'UsuariVendaEntradesController@resum');
//Route::delete('/emptyCart', 'CartController@emptyCart');
Auth::routes();

Route::get('/home', function () {
    return view('public.welcome');
});
Route::group(['prefix'=>'administra','as'=>'administra.'], function(){
    Route::resource('/', AdministraProductesBotigaController::class);
    Route::resource('/comandes', AdministraComandesBotigaController::class);
    Route::group(['prefix'=>'categories','as'=>'categories.'], function(){
        Route::resource('/', AdministraCategoriesBotigaController::class);
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
