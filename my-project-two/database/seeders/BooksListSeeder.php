<?php

namespace Database\Seeders;

use App\Models\BooksList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BooksList::factory()->count(10)->create();
    }
}
