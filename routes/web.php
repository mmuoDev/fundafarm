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
use App\FarmInvest;
use App\Farm;
use Illuminate\Support\Facades\DB;
Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/test', function(){
    $count = DB::select("select a.*, b.* from farm_invest as a, farm_progress as b where 
                a.farm_id = b.farm_id and a.status = 3 and b.farm_id = 3");
    dd(count($count));

});
Route::get('/markAsRead/{id}', 'HomeController@markAsRead');
Route::get('register/verify/{email}/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserController@verify'
]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('farms/details/{id}', 'IndexController@farm_details');
Route::get('/farms/available', 'HomeController@available_farms');
Route::match(['post', 'get'], 'farms/invest', 'HomeController@invest_farm');
Route::post('farms/payment', 'HomeController@farm_payment');
Route::get('my-farms', 'HomeController@my_farms');