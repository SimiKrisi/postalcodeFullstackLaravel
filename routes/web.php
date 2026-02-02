<?php
use App\Http\Controllers\CountiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('counties', CountiesController::class);