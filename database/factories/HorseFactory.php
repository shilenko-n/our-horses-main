<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Horse;
use App\Models\HorseBreed;
use App\Models\HorseColor;
use App\Models\HorseSpecialization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Horse>
 */
class HorseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'city_id' => City::query()->inRandomOrder()->first()->id,
            'chip_number' => fake()->randomNumber(),
            'birthday' => fake()->dateTime(),
            'birth_place' => fake()->city(),
            'purchase_date' => fake()->dateTime(),
            'height_withers' => fake()->numberBetween(1, 100),
            'gender' => fake()->randomElement(['male', 'female']),
            'horse_breed_id' => HorseBreed::query()->inRandomOrder()->first()->id,
            'horse_color_id' => HorseColor::query()->inRandomOrder()->first()->id,
            'horse_specialization_id' => HorseSpecialization::query()->inRandomOrder()->first()->id,
        ];
    }
}
