<?php

namespace App\Http\Controllers;

use App\Http\Resources\BooksListResource;
use App\Models\BooksList;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class BooksListController extends Controller
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
        $query = BooksList::query();

        $data = QueryBuilder::for($query)
            ->defaultSort('id')
            ->allowedSorts($this->allowedSorts())
            ->allowedFilters($this->allowedFilters())
            ->get();

        return response()->json(BooksListResource::collection($data), Response::HTTP_OK);
    }
}
