<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
