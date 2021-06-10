<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('book.index');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    Route::any('/book/search', [BookController::class, 'search'])->name('book.search');
    Route::get('/book/pdf', [BookController::class, 'exportPDF'])->name('book.export.pdf');
    Route::get('/book/excel', [BookController::class, 'exportExcel'])->name('book.export.excel');
    Route::resource('book', BookController::class);
});

Auth::routes(['verify' => true]);