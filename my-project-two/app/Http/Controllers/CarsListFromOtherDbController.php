<?php

namespace App\Http\Controllers;

use App\Models\CarsListFromOtherDb;
use Illuminate\Http\JsonResponse;

class CarsListFromOtherDbController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $cars = CarsListFromOtherDb::all();

        return response()->json($cars);
    }
}
