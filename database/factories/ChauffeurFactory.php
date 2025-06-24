<?php

namespace Database\Factories;

use App\Models\Chauffeur;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChauffeurFactory extends Factory
{
    protected $model = Chauffeur::class;

    public function definition(): array
    {
        $disponibilites = ['Disponible', 'Occupé', 'En pause', 'En congé'];

        return [
            'nom' => $this->faker->lastName() . ' ' . $this->faker->firstName(),
            'contact' => $this->faker->unique()->phoneNumber(),
            'disponibilité' => $this->faker->randomElement($disponibilites),
        ];
    }

    public function indisponible(): static
    {
        return $this->state(fn (array $attributes) => [
            'disponibilité' => 'Occupé',
        ]);
    }
}