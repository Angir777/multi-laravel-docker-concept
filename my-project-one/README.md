## Usuwa wszystkie tabele w bazie danych i ponownie wykonuje wszystkie migracje od zera + po migracji uruchamia wszystkie seedery z DatabaseSeeder.php

sail artisan migrate:fresh --seed

## Routing

Zwrócenie danych z aktualnego API: 
http://localhost:8000/api/cars-list/get-all

Zwrócenie danych z innego API: 
http://localhost:8000/api/books-list-from-other-api/get-all
