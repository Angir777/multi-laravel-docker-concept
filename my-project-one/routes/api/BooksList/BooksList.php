<?php

use App\Http\Controllers\BooksListFromOtherApiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'books-list-from-other-api',
], function () {
    Route::get('get-all', [BooksListFromOtherApiController::class, 'getAll']);
});
