<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trajet;
use Illuminate\Support\Facades\DB;

class TrajetSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Trajet::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Trajet::factory()->count(20)->create(); 
    }
}