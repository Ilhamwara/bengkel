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

Route::get('/', 'UserController@login');
// Route::get('/', function(){ 
  //     $pdo = DB::connection()->getPdo();
//       dd($pdo);
    // phpinfo();
// });
Route::post('post-login', 'UserController@postlogin');
// Auth::routes();

Route::group(['middleware' => ['session']], function () {

    Route::get('logout', 'UserController@logout');

    //Dashboard
    Route::get('home', 'DashboardController@home');
});
