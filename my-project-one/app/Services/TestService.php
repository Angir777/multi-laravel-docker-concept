<?php

namespace App\Services;

class TestService
{
    public function add(int $value) {
        $sum = $value + 5;
        return $sum;
    }
}
