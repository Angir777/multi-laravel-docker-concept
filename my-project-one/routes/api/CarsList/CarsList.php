<?php

use App\Http\Controllers\CarsListController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'cars-list',
], function () {
    Route::get('get-all', [CarsListController::class, 'getAll']);
});
