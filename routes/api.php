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
    'as' => 'api.',
    'namespace' => 'API'
], function () {
    Route::group([
        'as' => 'ajax.',
        'prefix' => 'ajax'
    ], function () {
        Route::get('stalls', 'AjaxController@getStalls')->name('stalls');
        Route::get('countries', 'AjaxController@getCountries')->name('countries');
        Route::get('industries', 'AjaxController@getIndustries')->name('industries');
        Route::get('exhibitors', 'AjaxController@getExhibitors')->name('exhibitors');
        Route::get('stallEquipment', 'AjaxController@getStallEquipment')->name('stallEquipment');
    });
});
