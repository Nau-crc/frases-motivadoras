<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_home_page_exists()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    public function test_show_phrase_exists()
    {
        $response = $this->get('/show/1');

        $response->assertStatus(200);
    }
    public function test_edit_page_exists()
    {
        $response = $this->get('/edit/1');

        $response->assertStatus(200);
    }
    public function test_user()
    {
        $user = User::factory()->create();
 
        $response = assertExists();
    }


}
