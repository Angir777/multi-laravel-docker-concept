<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class BooksListFromOtherApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $client = new Client();

        // Aplikacja `my-project-two` działa na localhost na porcie 8001
        $response = $client->get('http://host.docker.internal:8001/api/books-list/get-all');

        // Konwertujemy odpowiedź na tablicę
        $booksList = json_decode($response->getBody()->getContents(), true);

        return response()->json($booksList);
    }
}
