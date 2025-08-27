<?php

namespace Database\Seeders;

use App\Models\HorseColor;
use Illuminate\Database\Seeder;

class HorseColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            HorseColor::factory()->create();
        }
    }
}
