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

Route::get('/', 'IndexController@index')->name('index');
Route::resource('/projets','ProjetController');
Route::resource('/categorie','CategorieController');
Route::resource('/user','UserController');
Route::resource('/experience','ExperienceController');
Route::resource('/demande','DemandeController');
Route::resource('/poste','PosteController');
Route::resource('/avi','AviController');
Route::resource('/recrutement','RecrutementController');
Route::resource('/notification','NotificationController');
Route::get('/notification/read/{id}','NotificationController@notRead')->name('notifications.notRead')->middleware('auth');
Route::get('/poste/demandes/{id}','PosteController@demandes');
Route::get('/dashboard/{page?}','UserController@dashboard')->name("dashboard")->middleware('auth');
Route::post('/uploadImage','UserController@uploadImage')->name('uploadImage')->middleware('auth');

Route::post('/paiement/paypal','PaiementController@paypal')->name('paiement.paypal')->middleware('auth');
Route::get('/paiement/refund/{id}','PaiementController@refund')->name('paiement.paypalRefund')->middleware('auth');
Route::get('/paiement/paypal/success','PaiementController@paypalSuccess')->name('paiement.paypalSuccess')->middleware('auth');
Route::get('/paiement/retrait/{id}','PaiementController@retrait')->name('paiement.paypalRetrait')->middleware('auth');
Route::post('/paiement/retrait/Request','PaiementController@retraitRequest')->name('paiement.paypalRetraitRequest')->middleware('auth');
Route::get('/paiement/retrait/success/{id}','PaiementController@retraitSuccess')->name('paiement.paypalRetraitSuccess')->middleware('auth');
Route::get('/paiement/retrait/refus/{id}','PaiementController@retraitRefus')->name('paiement.paypalRetraitRefus')->middleware('auth');
Route::get('/paiement/delete/{id}','PaiementController@delete')->name('paiement.delete')->middleware('auth');

Route::resource('/paiement','PaiementController')->middleware('auth');

Route::resource('/message','MessageController')->middleware('auth');
Route::resource('/conversation','ConversationController')->middleware('auth');
Route::view('/email/register',"mails.register");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'SocialAuthGoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'SocialAuthGoogleController@handleGoogleCallback');

Route::get('/port_fl','PortfolioController@portfolio')->name('portfolio');


/*Terms, privacy & faq*/
Route::get('/conditions-d-utilisation','PublicController@terms')->name('terms');
Route::get('/politique-de-confidentialite','PublicController@privacy')->name('privacy');
Route::get('/faq','PublicController@faq')->name('faq');
Route::get('/contact','PublicController@contact')->name('contact');
Route::post('/submitContact','PublicController@submitContact')->name('submitContact');