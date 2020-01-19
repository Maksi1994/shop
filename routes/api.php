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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
  'prefix' => 'shops'
], function() {
  Route::post('save', 'ShopsController@save');
  Route::post('save-categories', 'ShopsController@save');
  Route::get('get-list', 'ShopsController@getList');
  Route::get('get-one/{id}', 'ShopsController@getOne');
  Route::get('delete/{id}', 'ShopsController@delete');
});

Route::group([
  'prefix' => 'positions'
], function() {
  Route::post('save', 'ShopsController@save');
  Route::get('get-all', 'ShopsController@getAll');
});

Route::group([
  'prefix' => 'workers'
], function() {
  Route::post('save', 'ShopsController@save');
  Route::get('get-list', 'ShopsController@getList');
  Route::get('get-one', 'ShopsController@getOne');
  Route::get('delete', 'ShopsController@delete');
});
