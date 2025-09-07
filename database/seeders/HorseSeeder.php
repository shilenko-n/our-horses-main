<?php

namespace Database\Seeders;

use App\Models\Horse;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 50; $i++) {
            $horse = Horse::factory()->create();
            $horse->owners()->attach(User::query()->inRandomOrder()->first());
        }
    }
}
