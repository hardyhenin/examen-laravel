<?php

namespace Database\Factories;

use App\Models\Passager;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassagerFactory extends Factory
{
    protected $model = Passager::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'contact' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'adresse' => $this->faker->address(),
        ];
    }

    public function noAddress(): static
    {
        return $this->state(fn (array $attributes) => [
            'adresse' => null,
        ]);
    }
}