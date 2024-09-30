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
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'id_product' => strtoupper($this->faker->bothify('PD####')),
            'name_product' => $this->faker->word(),
            'harga_satuan' => $this->faker->randomFloat(2, 10000, 50000), // Harga antara 10.000 - 50.000
            'stok_product' => $this->faker->numberBetween(10, 100), // Stok antara 10 - 100
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
