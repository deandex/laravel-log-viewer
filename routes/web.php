<?php

use Illuminate\Support\Facades\Route;
use Deandex\LaravelLogViewer\Http\Controllers\LogViewController;

Route::get('/', [LogViewController::class, 'index'])->name('log_view.index');
