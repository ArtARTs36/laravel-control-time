<?php

use ArtARTs36\ControlTime\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;

Route::post('times/create-from-excel', [TimeController::class, 'createFromExcel']);

Route::put('times/update-quantity/{time}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@updateQuantity');
Route::put('times/update-comment/{id}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@updateComment');
Route::get('times/page-{page}', '\ArtARTs36\ControlTime\Http\Controllers\TimeController@index');
Route::get('times/reports/{name}/{extension}', '\ArtARTs36\ControlTime\Http\Controllers\TimeReportController@report');
Route::apiResource('times', 'TimeController');
