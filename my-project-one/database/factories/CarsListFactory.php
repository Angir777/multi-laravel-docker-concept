<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarList>
 */
class CarsListFactory extends Factory
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
                'Toyota', 'Volkswagen', 'Ford', 'BMW', 'Mercedes-Benz',
                'Audi', 'Chevrolet', 'Honda', 'Nissan', 'Hyundai',
                'Kia', 'Mazda', 'Peugeot', 'Renault', 'Fiat',
                'Subaru', 'Porsche', 'Tesla', 'Jaguar', 'Land Rover',
                'Ferrari', 'Lamborghini', 'Aston Martin', 'Mitsubishi', 'Volvo'
            ]),
        ];
    }
}
