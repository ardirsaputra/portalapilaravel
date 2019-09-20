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

Route::get('/', function () {
    return view('welcome');
});

Route::get('telegram/server/{token}', 'TelegramController@server'); // need params server and pesan
Route::get('telegram/port/{token}', 'TelegramController@port');      // need params port and pesan
Route::get('telegram/user/{token}', 'TelegramController@user');      // need params user and pesan
Route::get('telegram/service/{token}', 'TelegramController@service'); // need params service and pesan
Route::get('telegram/{token}', 'TelegramController@msg');        // need params  pesan
Route::get('email/port/{token}', 'EmailController@port');
Route::get('all/port/{token}', 'AllController@port');