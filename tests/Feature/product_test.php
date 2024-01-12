<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class product_test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testing_whether_produuct_list_is_empty(): void
    {
        $response = $this->get('/add_product');

        $response->assertStatus(200);
    }
}
