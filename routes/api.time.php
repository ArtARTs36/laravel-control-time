<?php

use Illuminate\Support\Facades\Route;

Route::put('times/update-quantity/{time}', '\Dba\ControlTime\Http\Controllers\TimeController@updateQuantity');
Route::put('times/update-comment/{id}', '\Dba\ControlTime\Http\Controllers\TimeController@updateComment');
Route::get('times/page-{page}', '\Dba\ControlTime\Http\Controllers\TimeController@index');
Route::apiResource('times', 'TimeController');
