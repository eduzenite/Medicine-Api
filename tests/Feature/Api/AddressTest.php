<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function list_of_addresses_api()
    {
        $response = $this->get(route('addresses.index'));
        $response->assertStatus(200);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function create_address_api()
    {
        $response = $this->post(route('addresses.store'));
        $response->assertStatus(200);
        $response->assertJson(['id' => 1]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function details_of_address_api()
    {
        $id = 1;
        $response = $this->get(route('addresses.show', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function update_address_api()
    {
        $id = 1;
        $response = $this->put(route('addresses.update', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['updated' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function delete_address_api()
    {
        $id = 1;
        $response = $this->delete(route('addresses.destroy', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['deleted' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }
}
