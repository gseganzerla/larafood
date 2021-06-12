<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {


    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');


    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');

    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');


    
    Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');
});



Route::group(['prefix' => 'auth', 'namespace' => 'Api', 'middleware' => ['auth:sanctum']], function (){
    Route::post('/register', 'Auth\\RegisterController@store');
    Route::post('/token', 'Auth\\AuthClientController@auth');

    Route::get('me', 'Auth\\AuthClientController@me');
    Route::get('logout', 'Auth\\AuthClientController@logout');

    Route::post('orders', 'OrderApiController@store');

    Route::get('my-orders', 'OrderApiController@myOrders');

    Route::post('orders/{identify}/evaluations', 'EvaluationApiController@store');


});
