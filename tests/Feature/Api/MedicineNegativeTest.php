<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicineNegativeTest extends TestCase
{
    /**
     * @test
     */
    public function medicine_not_found()
    {
        $this->get(route('medicines.show', ['id' => 'a']))
            ->assertStatus(404);
    }
}
