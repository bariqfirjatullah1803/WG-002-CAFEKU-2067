<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use WithoutMiddleware;
    public function test_create_category()
    {
        // Create Data Kategori
        $response = $this->post('kategori',[
            'nama' => 'Makanan Pembuka'
        ]);
        // Response Status Found Data (302)
        $response->assertStatus(302);
    }
}
