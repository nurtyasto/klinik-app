<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'no' => $this->faker->unique()->numerify('RM-####'),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'age' => $this->faker->numberBetween(1, 90),
            'address' => $this->faker->address(),
        ];
    }
}