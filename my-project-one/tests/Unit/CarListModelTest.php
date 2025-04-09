<?php

use App\Models\CarsList;

// Test modelu
it('has a name attribute', function () {
    $carsList = new CarsList([
        'name' => 'CAR NAME'
    ]);
    expect($carsList->name)->toBe('CAR NAME');
});
