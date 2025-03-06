## Usuwa wszystkie tabele w bazie danych i ponownie wykonuje wszystkie migracje od zera + po migracji uruchamia wszystkie seedery z DatabaseSeeder.php

sail artisan migrate:fresh --seed

## Routing

Zwrócenie danych z aktualnego API: 
http://localhost:8001/api/books-list/get-all

Zwrócenie danych z innej bazy danych: 
http://localhost:8001/api/cars-list-from-other-db/get-all
