<?php

namespace Database\Seeders;

use App\Models\CarsList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarsList::factory()->count(10)->create();
    }
}
