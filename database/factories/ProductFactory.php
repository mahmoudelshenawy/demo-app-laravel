<?php

namespace Database\Factories;

use App\Models\Product;
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
            'name' => $this->faker->name,
            'desc' => $this->faker->sentence,
            'purchase_price' => 100,
            'selling_price' => 150,
            'stock' => 10,
            'image_path' => 'https://via.placeholder.com/300',
            'category_id' => rand(1, 3),
            'sub_category_id' => rand(4, 8),
        ];
    }
}
