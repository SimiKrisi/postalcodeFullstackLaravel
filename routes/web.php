<?php
use App\Http\Controllers\CountiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostalcodeController;
use App\Http\Controllers\ExportController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('counties', CountiesController::class);
Route::resource('postalcodes', PostalcodeController::class);

Route::get('/export/csv', [ExportController::class, 'csv'])->name('export.csv');
Route::get('/export/pdf', [ExportController::class, 'pdf'])->name('export.pdf');    
Route::resource('export', ExportController::class);
?>