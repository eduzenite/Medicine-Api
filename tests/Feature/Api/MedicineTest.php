<?php

namespace Tests\Feature\Api;

use App\Models\ActiveIngredient;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class MedicineTest extends TestCase
{

    /**
     * @test
     */
    public function list_of_medicines_api()
    {
        $response = $this->get(route('medicines.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function create_medicine_api()
    {
        $response = $this->post(route('medicines.store'));
        $response->assertStatus(200);
        $response->assertJson(['id' => 1]);
    }

    /**
     * @test
     */
    public function details_of_medicine_api()
    {
        $id = 1;
        $response = $this->get(route('medicines.show', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['id' => $id]);
    }

    /**
     * @test
     */
    public function update_medicine_api()
    {
        $id = 1;
        $response = $this->put(route('medicines.update', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['updated' => true, 'id' => $id]);
    }

    /**
     * @test
     */
    public function delete_medicine_api()
    {
        $id = 1;
        $response = $this->delete(route('medicines.destroy', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['deleted' => true, 'id' => $id]);
    }
}
