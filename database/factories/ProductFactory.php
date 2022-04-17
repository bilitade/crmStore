<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title,
            'description' => $this->faker->text,
            'user_id' => $this->faker->numberBetween(1,3),
            'store_id' => $this->faker->numberBetween(1,3),
            'category_id' => $this->faker->numberBetween(1,3),
            'status' => $this->faker->text(5),
            'image' => $this->faker->text(15),
            'price' => $this->faker->randomFloat(2, 1, 100 ),
            //
        ];
    }
}
