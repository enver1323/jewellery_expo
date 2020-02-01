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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'namespace' => 'Web'
], function () {
    Route::get('/', 'IndexController@index')->name('home');

    Route::group([
        'as' => 'cabinet.',
        'prefix' => 'cabinet',
        'namespace' => 'Cabinet',
        'middleware' => ['auth']
    ], function() {
        Route::get('', 'CabinetController@index')->name('index');

        Route::group([
            'as' => 'profile.',
            'prefix' => 'profile'
        ], function() {
            Route::get('edit', 'CabinetController@editProfile')->name('edit');
            Route::patch('update', 'CabinetController@updateProfile')->name('update');
        });

        Route::resource('visas', 'VisaController');
        Route::resource('badges', 'BadgeController');
        Route::resource('stalls', 'StallController');
    });
});
