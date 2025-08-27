<?php

namespace Database\Seeders;

use App\Models\HorseBreed;
use Illuminate\Database\Seeder;

class HorseBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            HorseBreed::factory()->create();
        }
    }
}
