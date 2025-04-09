<?php

use App\Models\CarsList;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

/**
 * Uruchomienie tego testu pojedyńczo
 * sail artisan test --filter CarListControllerTest
 */

beforeEach(function () {
    // Głowny URL testowanego endpointu
    $this->url = '/api/cars-list/';
});

it('test pobrania całej listy', function () {
    // URL
    $apiUrl = $this->url . 'get-all';

    // 200 http ok
    getJson($apiUrl)->assertStatus(200); // Automatycznie dodaje nagłówek Accept: application/json, więc serwer zwraca odpowiedź w formacie JSON.
    // $this->get($apiUrl)->assertStatus(200); //  Nie wymusza JSON – jeśli endpoint może zwrócić np. HTML, to Laravel nie wymusi JSON-a.
});

it('test tworzenie nowej pozycji', function () {
    // URL
    $apiUrl = $this->url;

    // Dane
    $data = [
        'name' => 'Car 1',
    ];

    // 201 http created
    $response = postJson($apiUrl, $data)->assertStatus(201);

    // Test zwracanej struktury
    $response->assertJsonStructure([
        'id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ]);

    // Weryfikacja czy na bazie jest rekord o danym name
    $this->assertDatabaseHas('cars_lists', [
        'name' => 'Car 1',
    ]);

    // Weryfikacja, czy odpowiedź zawiera dokładnie te dane, które zostały zapisane
    $response->assertJson([
        'name' => 'Car 1',
        'deleted_at' => null,
    ]);
});

it('test tworzenie nowej pozycji bez wymaganego paramtru', function () {
    // URL
    $apiUrl = $this->url;

    // Brak nazwy
    $data = [];

    // 422 Unprocessable Entity, ponieważ brak wymaganych danych
    $response = postJson($apiUrl, $data)->assertStatus(422);

    // Weryfikacja, czy odpowiedź zawiera błąd dla 'name'
    $response->assertJsonValidationErrors(['name']);
});

it('test aktualizacji istniejącej pozycji', function () {
    // Utworzenie pozycji testowej
    $car = CarsList::create([
        'name' => 'Do aktualizacji',
    ]);

    // URL
    $apiUrl = $this->url;

    // Zaktualizowane dane
    $data = [
        'id' => $car->id,
        'name' => 'KAMAZ',
    ];

    // 200 http ok
    patchJson($apiUrl, $data)->assertStatus(200);

    // Sprawdzenie, czy pozycja istneje w bazie
    $this->assertDatabaseHas('cars_lists', [
        'id' => $car->id,
    ]);
});

it('test aktualizacji nie istniejącej pozycji', function () {
    // URL
    $apiUrl = $this->url;

    // Dane dla nieistniejącego zasobu
    $data = [
        'id' => 999999, // zakładając, że taki ID nie istnieje
        'name' => 'KAMAZ',
    ];

    // 404 Not Found
    patchJson($apiUrl, $data)->assertStatus(404);
});

it('test usunięcia', function () {
    // Utworzenie pozycji testowej
    $car = CarsList::create([
        'name' => 'Do usunięcia',
    ]);

    // URL
    $apiUrl = $this->url . $car->id;

    // 200 http ok
    deleteJson($apiUrl)->assertStatus(200);

    // Sprawdzenie usunięcia (soft delete), 
    // a jakbyśmy chcieli sprawdzić całkowite usuniecie to poprzez (assertDatabaseMissing)
    $this->assertSoftDeleted('cars_lists', [
        'id' => $car->id,
    ]);
});

// https://github.com/LaravelDaily/Laravel-Pest-Tests-MiniCRM/blob/main/tests/Feature/UserTest.php
// https://dev.to/alphaolomi/step-by-step-to-pest-php-testing-framework-in-laravel-10-6e1
// https://medium.com/@faizanzulfiqar/unit-testing-in-laravel-via-pest-framework-9ccb9f672681
// https://www.luckymedia.dev/blog/laravel-for-beginners-phpunit-and-pest-tests