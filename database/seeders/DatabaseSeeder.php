<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PassagerSeeder::class,
            ChauffeurSeeder::class,
            VehiculeSeeder::class, 
            TrajetSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}