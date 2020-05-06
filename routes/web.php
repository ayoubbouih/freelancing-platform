<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'indexController@index')->name('index');
Route::resource('/projets','projetController');
Route::resource('/categorie','categorieController');
Route::resource('/user','userController');
Route::resource('/paiement','PaiementController')->middleware('auth');
Route::get('/t/{id}',"TController@index");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
