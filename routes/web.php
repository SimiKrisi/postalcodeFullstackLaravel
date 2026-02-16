<?php
use App\Http\Controllers\CountiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostalcodeController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('counties', CountiesController::class);
Route::resource('postalcodes', PostalcodeController::class);