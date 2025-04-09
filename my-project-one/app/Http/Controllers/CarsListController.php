<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\CarsListResource;
use App\Models\CarsList;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class CarsListController extends Controller
{
    /**
     * Dostępne opcje sortowania
     *
     * @return array
     */
    protected function allowedSorts(): array
    {
        return [
            AllowedSort::field('id', 'id'),
            AllowedSort::field('name', 'name'),
        ];
    }

    /**
     * Dostępne opcje filtrowania
     *
     * @return array
     */
    protected function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('id', 'id'),
            AllowedFilter::exact('name', 'name'),
        ];
    }

    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $query = CarsList::query();

        $data = QueryBuilder::for($query)
            ->defaultSort('id')
            ->allowedSorts($this->allowedSorts())
            ->allowedFilters($this->allowedFilters())
            ->get();

        return response()->json(CarsListResource::collection($data), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $res = DB::transaction(function () use ($data) {
            $newCar = CarsList::create([
                'name' => $data['name'],
            ]);

            if (!$newCar) {
                throw new HttpResponseException(
                    ResponseHelper::response(['error' => 'CANT_CREATE'], Response::HTTP_UNPROCESSABLE_ENTITY)
                );
            }

            return $newCar;
        });

        return ResponseHelper::response(new CarsListResource($res), Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $res = DB::transaction(function () use ($data) {
            $car = CarsList::find($data['id']);

            if (!$car) {
                throw new HttpResponseException(
                    ResponseHelper::response(['error' => 'CAR_NOT_FOUND'], Response::HTTP_NOT_FOUND)
                );
            }

            $newCar = $car->update([
                'name' => $data['name'],
            ]);

            if (!$newCar) {
                throw new HttpResponseException(
                    ResponseHelper::response(['error' => 'CANT_UPDATE'], Response::HTTP_UNPROCESSABLE_ENTITY)
                );
            }

            return $car;
        });

        return ResponseHelper::response(new CarsListResource($res), Response::HTTP_OK);
    }

     /**
     * @param Request $request
     * @param CarsList $carsList
     * 
     * @return JsonResponse
     */
    public function delete(Request $request, CarsList $carsList): JsonResponse
    {
        $carsList->delete();

        return ResponseHelper::response(new CarsListResource($carsList), Response::HTTP_OK);
    }
}
