<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingsSeeder::class,
            CurrencySeeder::class,
            MenuSeeder::class,
            LocationSeeder::class,
            HorseBreedSeeder::class,
            HorseColorSeeder::class,
            HorseSpecializationSeeder::class,
            UserSeeder::class,
            HorseSeeder::class,
            OfferSeeder::class,
        ]);
    }
}
