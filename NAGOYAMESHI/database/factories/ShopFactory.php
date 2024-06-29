<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->realText(10),
            'description' => fake()->realText(30, 5),
            'start_price' => fake()->randomElement([1000]),
            'end_price' => fake()->randomElement([2000]),
            'opening_hour'=> fake()->numberBetween(10, 15),
            'closed_hour'=> fake()->numberBetween(18, 24),
            'postal_code'=> fake()->postcode(),
            'address'=> fake()->address(),
            'phone'=> fake()->phoneNumber(),
            'regular_holiday'=> fake()->randomElement(['月曜日','火曜日','水曜日','木曜日','金曜日','土曜日','日曜日']),
            'category_id' => fake()->numberBetween(1, 25),
        ];
    }
}
