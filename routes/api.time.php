<?php

use Dba\ControlTime\Support\Proxy;
use Illuminate\Support\Facades\Route;

Route::put(Proxy::apiRoute('times/update-quantity/{id}'), '\Dba\ControlTime\Http\Controllers\TimeController@updateQuantity');
Route::put(Proxy::apiRoute('times/update-comment/{id}'), '\Dba\ControlTime\Http\Controllers\TimeController@updateComment');
Route::get(Proxy::apiRoute('times/page-{page}'), '\Dba\ControlTime\Http\Controllers\TimeController@index');
Route::apiResource(Proxy::apiRoute('times'), '\Dba\ControlTime\Http\Controllers\TimeController');
