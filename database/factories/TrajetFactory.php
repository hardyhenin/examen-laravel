<?php

namespace Database\Factories;

use App\Models\Trajet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrajetFactory extends Factory
{
    protected $model = Trajet::class;

    public function definition(): array
    {
        $villesMadagascar = [
            'Antananarivo', 'Toamasina', 'Fianarantsoa', 'Mahajanga', 'Toliara', 'Antsiranana',
            'Antsirabe', 'Ambositra', 'Morondava', 'Manakara', 'Sambava', 'Nosy Be'
        ];

        return [
            'depart' => $this->faker->randomElement($villesMadagascar),
            'destination' => $this->faker->randomElement($villesMadagascar),
            'duree_estimee' => $this->faker->numberBetween(1, 12) . ' heures', 
        ];
    }

    public function longDistance(): static
    {
        return $this->state(fn (array $attributes) => [
            'duree_estimee' => $this->faker->numberBetween(12, 24) . ' heures',
        ]);
    }
}