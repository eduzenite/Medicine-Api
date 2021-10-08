<?php

namespace Database\Factories;

use App\Models\ActiveIngredient;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence(10, true);
        return [
            'active_ingredient_id' => ActiveIngredient::inRandomOrder()->first()->id,
            'manufacturer_id' => Manufacturer::inRandomOrder()->first()->id,
            'name' => $name,
            'short_name' => $this->faker->sentence(5, true),
            'slug' => Str::slug($name, '-'),
        ];
    }
}
