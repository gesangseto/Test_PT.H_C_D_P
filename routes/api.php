<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['toApi']], function () {
    // master
    Route::group(['prefix' => '/master'], function () {
        Route::get('/customer', 'API\CustomerController@get');
        Route::put('/customer', 'API\CustomerController@insert');
        Route::post('/customer', 'API\CustomerController@update');
        Route::delete('/customer', 'API\CustomerController@delete');

        Route::get('/province', 'API\ProvinceController@get');
        Route::put('/province', 'API\ProvinceController@insert');
        Route::post('/province', 'API\ProvinceController@update');
        Route::delete('/province', 'API\ProvinceController@delete');

        Route::get('/city', 'API\CityController@get');
        Route::put('/city', 'API\CityController@insert');
        Route::post('/city', 'API\CityController@update');
        Route::delete('/city', 'API\CityController@delete');
    });
});
