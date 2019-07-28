<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//MailGun Routes WebHook
Route::group(['prefix' => 'mailgun',], function () {
    Route::post('widgets', 'MailgunWidgetsController@store');
});

//Save Image from AJAX Calls and API implementation
Route::get('save-image', 'Api\ImageController@index');      //Debug process
Route::post('save-image', 'Api\ImageController@save')->name('save-image-ajax');
