<?php

namespace Database\Factories;

use App\Models\CategoryMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryMaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryMaterial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'=>$this->faker->numberBetween(1,7),
            'material_id'=>$this->faker->numberBetween(1,20)
        ];
    }
}
