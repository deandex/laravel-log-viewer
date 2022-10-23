<?php

use Illuminate\Support\Facades\Route;
use Deandex\LaravelLogViewer\Http\Controllers\LogViewController;

Route::get('/', [LogViewController::class, 'index'])->name('log_view.index');
Route::get('/download', [LogViewController::class, 'download'])->name('log_view.download');
Route::delete('/', [LogViewController::class, 'destroy'])->name('log_view.destroy');
