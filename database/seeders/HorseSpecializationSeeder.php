<?php

namespace Database\Seeders;

use App\Models\HorseSpecialization;
use Illuminate\Database\Seeder;

class HorseSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            HorseSpecialization::factory()->create();
        }
    }
}
