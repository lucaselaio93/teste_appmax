<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(1),
            'product_sku' => $this->faker->unique()->swiftBicNumber,
            'product_qnt' => null,//$this->faker->randomNumber(4),
            'stock_id' => null,
        ];
    }
}
