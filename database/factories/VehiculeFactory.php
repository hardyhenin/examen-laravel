<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    public function definition(): array
    {
        $marques = ['Toyota', 'Mercedes-Benz', 'DODOGE', 'BMW', 'Volkswagen', 'Ford'];
        $modeles = ['M3 compétiton', 'SRT V8', 'Sprinter', 'Corolla', 'Crafter', 'Focus', 'Transit', 'Sprinter'];
        $status = ['Disponible', 'En maintenance', 'En mission', 'Hors service'];

        return [
            'immatriculation' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}[A-Z]{2}'),
            'marque' => $this->faker->randomElement($marques),
            'modele' => $this->faker->randomElement($modeles),
            'statu' => $this->faker->randomElement($status),
        ];
    }
}