<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Passager;
use App\Models\Trajet;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        $statuts = ['en_attente', 'confirmée', 'terminée', 'annulée'];

        return [
            'passagers_id' => Passager::factory(),
            'trajets_id' => Trajet::factory(),
            'vehicules_id' => Vehicule::factory(),
            'chauffeurs_id' => Chauffeur::factory(),
            'date_reservation' => $this->faker->dateTimeBetween('now', '+1 year'),
            'statut' => $this->faker->randomElement($statuts),
        ];
    }

    public function enAttente(): static
    {
        return $this->state(fn (array $attributes) => [
            'statut' => 'en_attente',
        ]);
    }

    public function confirmee(): static
    {
        return $this->state(fn (array $attributes) => [
            'statut' => 'confirmée',
        ]);
    }
    
    public function sansVehiculeNiChauffeur(): static
    {
        return $this->state(fn (array $attributes) => [
            'vehicules_id' => null,
            'chauffeurs_id' => null,
        ]);
    }
}