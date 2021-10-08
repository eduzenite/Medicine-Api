<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IngredientTest extends TestCase
{
    /**
     * @test
     */
    public function list_of_ingredients_api()
    {
        $response = $this->get(route('ingredients.index'));
        $response->assertStatus(200);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function create_ingredient_api()
    {
        $response = $this->post(route('ingredients.store'));
        $response->assertStatus(200);
        $response->assertJson(['id' => 1]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function details_of_ingredient_api()
    {
        $id = 1;
        $response = $this->get(route('ingredients.show', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function update_ingredient_api()
    {
        $id = 1;
        $response = $this->put(route('ingredients.update', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['updated' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function delete_ingredient_api()
    {
        $id = 1;
        $response = $this->delete(route('ingredients.destroy', ['id' => $id]));
        $response->assertStatus(200);
        $response->assertJson(['deleted' => true, 'id' => $id]);
        $this->withoutExceptionHandling();
    }
}
