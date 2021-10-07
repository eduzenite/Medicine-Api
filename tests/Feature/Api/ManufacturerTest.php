<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufacturerTest extends TestCase
{
    /**
     * @test
     */
    public function list_of_manufacturers_api()
    {
        $response = $this->get(route('manufacturers.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function create_manufacturer_api()
    {
        $response = $this->post(route('manufacturers.store'));
        $response->assertStatus(200);
        $response->assertJson(['id' => 1]);
    }

    /**
     * @test
     */
    public function details_of_manufacturer_api()
    {
        $id = 1;
        $response = $this->get(route('manufacturers.show', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['id' => $id]);
    }

    /**
     * @test
     */
    public function update_manufacturer_api()
    {
        $id = 1;
        $response = $this->put(route('manufacturers.update', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['updated' => true, 'id' => $id]);
    }

    /**
     * @test
     */
    public function delete_manufacturer_api()
    {
        $id = 1;
        $response = $this->delete(route('manufacturers.destroy', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['deleted' => true, 'id' => $id]);
    }
}
