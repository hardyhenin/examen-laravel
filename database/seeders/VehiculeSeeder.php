<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicule;
use Illuminate\Support\Facades\DB;

class VehiculeSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Vehicule::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Vehicule::factory()->count(15)->create();
    }
}