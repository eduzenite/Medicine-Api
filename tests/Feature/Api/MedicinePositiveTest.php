<?php

namespace Tests\Feature\Api;

use App\Models\Medicine;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Tests\TestCase;

class MedicinePositiveTest extends TestCase
{

    /**
     * @test
     */
    public function creating_a_medicine()
    {
        $faker = Faker::create();
        $name = $faker->sentence(10, true);
        $data = [
            'active_ingredient_id' => 1,
            'manufacturer_id' => 1,
            'name' => $name,
            'short_name' => $faker->sentence(5, true),
            'slug' => Str::slug($name, '-'),
            'category_id' => 1
        ];

        $this->post(route('medicines.store'), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * @test
     */
    public function editing_a_medicine()
    {
        $faker = Faker::create();
        $name = $faker->sentence(10, true);
        $data = [
            'active_ingredient_id' => 1,
            'manufacturer_id' => 1,
            'name' => $name,
            'short_name' => $faker->sentence(5, true),
            'slug' => Str::slug($name, '-'),
            'category_id' => 1
        ];

        $this->put(route('medicines.update', ['id' => 1]), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    /**
     * @test
     */
    public function deleting_a_medicine()
    {
        $this->put(route('medicines.destroy', ['id' => 1]))
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function reading_a_medicine()
    {
        $this->get(route('medicines.show', ['id' => 1]))
            ->assertStatus(200);
    }
}
