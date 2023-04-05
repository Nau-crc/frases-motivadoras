<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\PhraseSeeder;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_route_create()
    {
        $response = $this->get('/create');

        $response->assertStatus(200);
    }

    public function test_route_store()
    {
        $this->seed(PhraseSeeder::class);

        $response = $this->post('/store');

        $response->assertStatus(302);
    }

    public function test_route_show()
    {
        $this->seed(PhraseSeeder::class);

        $response = $this->get('/show/1');

        $response->assertStatus(200);
    }

    public function test_route_edit()
    {
        $this->seed(PhraseSeeder::class);

        $response = $this->get('/edit/1');

        $response->assertStatus(200);
    }

    public function test_route_update()
    {
        $this->seed(PhraseSeeder::class);

        $response = $this->patch('/update/1');

        $response->assertStatus(302);
    }

    public function test_route_delete()
    {
        $this->withoutExceptionHandling();
        $this->seed(PhraseSeeder::class);

        $response = $this->delete('/destroy/1');
        $response->assertStatus(302);
    }
}
