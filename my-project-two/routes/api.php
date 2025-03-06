<?php

use App\Helpers\RouteHelper;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the WZRouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
RouteHelper::includeRouteFiles(__DIR__ . '/api');
