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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::group([
        'namespace' => 'Web'
    ], function () {
        Route::get('/', 'IndexController@index')->name('home');

        Route::group([
            'as' => 'info.',
            'prefix' => 'info'
        ], function () {
            Route::get('about-fair', 'PageController@infoAboutFair')->name('aboutFair');
            Route::get('product-sections', 'PageController@infoProductSections')->name('productSections');
            Route::get('for-exhibitor', 'PageController@forExhibitor')->name('forExhibitor');
            Route::get('for-visitor', 'PageController@forVisitor')->name('forVisitor');
        });

        Route::group([
            'as' => 'cabinet.',
            'prefix' => 'cabinet',
            'namespace' => 'Cabinet',
            'middleware' => ['auth']
        ], function () {
            Route::get('', 'CabinetController@editProfile')->name('profile');
            Route::patch('update', 'CabinetController@updateProfile')->name('update');

            Route::group([
                'as' => 'sections.',
                'prefix' => 'sections'
            ], function () {
                Route::get('', 'CabinetController@editIndustries')->name('edit');
                Route::patch('update', 'CabinetController@updateIndustries')->name('update');
            });

            Route::resource('visas', 'VisaController');
            Route::resource('badges', 'BadgeController');
            Route::resource('stalls', 'StallController');
        });
    });

    Route::group([
        'namespace' => 'Admin',
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth', 'can:accessAdminPanel']
    ], function () {
        Route::get('', 'IndexController@index')->name('home');

        Route::resource('users', 'UserController');
        Route::resource('visas', 'VisaController');
        Route::resource('badges', 'BadgeController');
        Route::resource('slides', 'SlideController');
        Route::resource('stalls', 'StallController');
        Route::resource('industries', 'IndustryController');
        Route::resource('stallEquipment', 'StallEquipmentController');
    });

});
