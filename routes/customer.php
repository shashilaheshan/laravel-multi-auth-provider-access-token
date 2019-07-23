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

Route::post('oauth/token', 'CusAuthController@auth');
Route::middleware('auth:customers')->get('/user', function (Request $request) {
    $data = ['user' => $request->user(), 'type' => 'merchant'];
    return $data;
});
Route::middleware('auth:customers')->get('/customers', [
    'uses' => 'CustomerController@getcustomers'
]);
Route::post('/registercustomer', [
    'uses' => 'CustomerController@register'
]);