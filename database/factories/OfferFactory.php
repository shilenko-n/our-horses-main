<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'horse_id'      => Horse::all()->random()->id,
            'price'         => $this->faker->numberBetween(1000, 10000),
            'currency_id'   => Currency::all()->random()->id,
            'description'   => $this->faker->realText(),
        ];
    }
}
