<?php

use App\Http\Controllers\BooksListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'books-list',
], function () {
    Route::get('get-all', [BooksListController::class, 'getAll']);
});
