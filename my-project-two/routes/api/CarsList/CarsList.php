<?php

use App\Http\Controllers\CarsListFromOtherDbController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'cars-list-from-other-db',
], function () {
    Route::get('get-all', [CarsListFromOtherDbController::class, 'getAll']);
});
