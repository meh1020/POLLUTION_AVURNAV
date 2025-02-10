<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvurnavController;


Route::get('/export-pdf_nav/{id}', [AvurnavController::class, 'exportPDF'])->name('export.pdf');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/avurnav', [AvurnavController::class, 'index'])->name('avurnav.index');
Route::get('/avurnav/create', [AvurnavController::class, 'create'])->name('avurnav.create');
Route::post('/avurnav/store', [AvurnavController::class, 'store']);

use App\Http\Controllers\PollutionController;

Route::resource('pollutions', PollutionController::class);

Route::get('/export-pdf/{id}', [PollutionController::class, 'exportPDF'])->name('pollutions.exportPDF');


use App\Http\Controllers\SitrepController;

Route::resource('sitreps', SitrepController::class);

Route::get('/sitreps/{id}/export-pdf', [SitrepController::class, 'exportPDF'])->name('sitreps.exportPDF');






