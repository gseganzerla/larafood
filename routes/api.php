<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Api'], function () {


    Route::get('/tenants/{uuid}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');


    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TableApiController@show');
    Route::get('/tables', 'TableApiController@tablesByTenant');

    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');


    Route::post('/clients', 'Auth\\RegisterController@store');

    Route::post('/sanctum/token', 'Auth\\AuthClientController@auth');
});

Route::group(['namespace' => 'Api', 'middleware' => ['auth:sanctum']], function (){
    Route::get('/auth/me', 'Auth\\AuthClientController@me');
    Route::get('/auth/logout', 'Auth\\AuthClientController@logout');


});
