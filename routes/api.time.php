<?php

use Illuminate\Support\Facades\Route;

Route::put('times/update-quantity/{time}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@updateQuantity');
Route::put('times/update-comment/{id}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@updateComment');
Route::get('times/page-{page}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@index');
Route::apiResource('times', 'TimeController');
