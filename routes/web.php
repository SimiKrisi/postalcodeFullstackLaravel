<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountiesController;
use App\Http\Controllers\PostalcodeController;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('counties', CountiesController::class)->only(['index', 'show']);
Route::resource('postalcodes', PostalcodeController::class)->only(['index', 'show']);

Route::get('/export/csv', [ExportController::class, 'csv'])->name('export.csv');
Route::get('/export/pdf', [ExportController::class, 'pdf'])->name('export.pdf');    
Route::post('/export/send-pdf', [ExportController::class, 'sendPdfEmail'])->name('export.sendEmail');
Route::resource('export', ExportController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    Route::resource('counties', CountiesController::class)->except(['index', 'show']);
    Route::resource('postalcodes', PostalcodeController::class)->except(['index', 'show']);
});


require __DIR__.'/auth.php';