<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function list_of_categories_api()
    {
        $response = $this->get(route('categories.index'));
        $response->assertStatus(200);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function create_category_api()
    {
        $response = $this->post(route('categories.store'));
        $response->assertStatus(200);
        $response->assertJson(['id' => 1]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function details_of_category_api()
    {
        $id = 1;
        $response = $this->get(route('categories.show', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function update_category_api()
    {
        $id = 1;
        $response = $this->put(route('categories.update', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['updated' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function delete_category_api()
    {
        $id = 1;
        $response = $this->delete(route('categories.destroy', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['deleted' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }
}
