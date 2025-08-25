<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Database\Factories\CountryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for($i = 0; $i < 10; $i++) {
            $country = Country::factory()->create();

            for($j = 0; $j < 5; $j++) {
                City::factory()->create([
                    'country_id' => $country->id,
                ]);
            }

        }

    }
}
