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

Route::post('oauth/token', 'MerChantAuthController@auth');
Route::middleware('auth:merchants')->get('/user', function (Request $request) {
    $data = ['user' => $request->user(), 'type' => 'merchant'];
    return $data;
});
Route::post('/registermerchant', [
    'uses' => 'MerchantController@register'
]);
