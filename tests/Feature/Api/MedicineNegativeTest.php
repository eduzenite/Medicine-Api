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
        $this->json('get', route('medicines.show', ['id' => 99]))
            ->assertStatus(404);
        $this->withoutExceptionHandling();
    }
}
