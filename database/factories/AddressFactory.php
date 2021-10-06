<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'zipcode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'state' => $this->faker->sentence(3, true),
            'city' => $this->faker->city(),
            'district' => $this->faker->sentence(3, true),
            'address' => $this->faker->address(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->firstNameMale()
        ];
    }
}
