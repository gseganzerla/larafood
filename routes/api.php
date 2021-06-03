<?php

use Illuminate\Support\Facades\Route;

Route::get('/tenants/{uuid}', 'Api\\TenantApiController@show');
Route::get('/tenants', 'Api\\TenantApiController@index');


Route::get('/categories/{url}', 'Api\\CategoryApiController@show');
Route::get('/categories', 'Api\\CategoryApiController@categoriesByTenant');
