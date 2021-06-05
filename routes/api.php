<?php

use Illuminate\Support\Facades\Route;

Route::get('/tenants/{uuid}', 'Api\\TenantApiController@show');
Route::get('/tenants', 'Api\\TenantApiController@index');


Route::get('/categories/{url}', 'Api\\CategoryApiController@show');
Route::get('/categories', 'Api\\CategoryApiController@categoriesByTenant');

Route::get('/tables/{identify}', 'Api\\TableApiController@show');
Route::get('/tables', 'Api\\TableApiController@tablesByTenant');

Route::get('/products/{flag}', 'Api\\ProductApiController@show');
Route::get('/products', 'Api\\ProductApiController@productsByTenant');


Route::post('/clients', 'Api\\Auth\\RegisterController@store');
Route::post('/sanctum/token', 'Api\\Auth\\AuthClientController@auth');