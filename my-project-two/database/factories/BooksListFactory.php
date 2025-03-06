<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BooksList>
 */
class BooksListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Władca Pierścieni', 'Harry Potter', 'Duma i uprzedzenie', '1984', 'Hobbit',
                'Zbrodnia i kara', 'Lalka', 'Mały Książę', 'Gra o tron', 'Cień wiatru',
                'Wiedźmin - Krew elfów', 'Pan Tadeusz', 'Mistrz i Małgorzata', 'Rok 1984', 'Bracia Karamazow'
            ]),
        ];
    }
}
