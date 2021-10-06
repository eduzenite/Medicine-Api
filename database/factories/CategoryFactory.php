<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(10, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->sentence(20, true),
            'causes' => $this->faker->sentence(20, true),
            'symptoms' => $this->faker->sentence(20, true)
        ];
    }
}
