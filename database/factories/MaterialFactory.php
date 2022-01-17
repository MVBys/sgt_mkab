<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\PseudoTypes\True_;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => $this->faker->randomDigit,
            'pdf_link' => $this->faker->word.'.pdf',
            'published'=> True,
            'image' => $this->faker->randomElement(['materialcard1.jpg','materialcard2.jpg','materialcard3.jpg']),

        ];
    }
}
