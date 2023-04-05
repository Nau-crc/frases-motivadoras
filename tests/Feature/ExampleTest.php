<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Phrase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_home_page_retrieve_all_phrases()
    {
        $this->withoutExceptionHandling();
        $phrases = Phrase::factory(10)->create();
        
        $this->assertCount(10, $phrases);
        
        $response = $this->get('/home');
        $response->assertStatus(200)
                 ->assertViewIs('home')
                 ->assertViewHas('phrases', $phrases);
    }
}
