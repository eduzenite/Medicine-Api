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
    public function list_of_medicines()
    {
        $response = $this->get(route('medicines.index'));
        $response->assertStatus(200);
        $this->withoutExceptionHandling();
    }

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
        ];
        $this->post(route('medicines.store'), $data)
            ->assertStatus(200)
            ->assertJson($data);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function editing_a_medicine()
    {
        $faker = Faker::create();
        $medicine = Medicine::inRandomOrder()->first();
        $name = $faker->sentence(10, true);
        $data = [
            'active_ingredient_id' => 1,
            'manufacturer_id' => 1,
            'name' => $name,
            'short_name' => $faker->sentence(5, true),
            'slug' => Str::slug($name, '-'),
        ];
        $this->put(route('medicines.update', ['id' => $medicine->id]), $data)
            ->assertStatus(200)
            ->assertJson($data);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function deleting_a_medicine()
    {
        $medicine = Medicine::inRandomOrder()->first();
        $this->delete(route('medicines.destroy', ['id' => $medicine->id]))
            ->assertStatus(200);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function reading_a_medicine()
    {
        $medicine = Medicine::inRandomOrder()->first();
        $this->get(route('medicines.show', ['id' => $medicine->id]))
            ->assertStatus(200);
        $this->withoutExceptionHandling();
    }
}
