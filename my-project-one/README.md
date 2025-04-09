## Usuwa wszystkie tabele w bazie danych i ponownie wykonuje wszystkie migracje od zera + po migracji uruchamia wszystkie seedery z DatabaseSeeder.php

sail artisan migrate:fresh --seed

## Routing

Zwrócenie danych z aktualnego API: 
http://localhost:8000/api/cars-list/get-all

Zwrócenie danych z innego API: 
http://localhost:8000/api/books-list-from-other-api/get-all

## Testy na PEST

- Usunięcie PHPUnit: composer remove phpunit/phpunit

- Instalacja Pest z wszystkimi zależnościami: composer require pestphp/pest --dev --with-all-dependencies
- Inicjalizacja PEST: ./vendor/bin/pest --init
- Uruchomienie testów: ./vendor/bin/pest lub sail artisan test
- Można też dodać w composer.json skrypt: sail composer test
- Instalacja pakietu dla laravela: composer require pestphp/pest-plugin-laravel --dev
- Dodanie pliku .env.test
- Edycja pliku phpunit.xml by miał połączenie z bazą danych.

- Tworzenie testu funkcjonalnego: sail artisan make:test CarListTest --pest
- Tworzenie testu jednostkowego: sail artisan make:test CarListModelTest --unit --pest
- Uruchomienie wygranego testu: sail artisan test --filter CarListModelTest
