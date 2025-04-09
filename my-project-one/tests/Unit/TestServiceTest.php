<?php

use App\Services\TestService;

it('test serwisu', function () {
    $service = new TestService();
        
    // Testujemy, czy dodanie 5 do 10 daje 15
    $result = $service->add(10);
    
    // $this->assertEquals(15, $result);
    expect($result)->toEqual(15);
});

