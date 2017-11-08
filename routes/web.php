<?php

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

use Illuminate\Support\Facades\Mail;

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('register/verify/{email}/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserController@verify'
]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('farms/details/{id}', 'IndexController@farm_details');
Route::get('/farms/available', 'HomeController@available_farms');
Route::match(['post', 'get'], 'farms/invest', 'HomeController@invest_farm');

