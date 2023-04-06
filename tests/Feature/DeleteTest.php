<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Phrase;

class DeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_auth_user_can_delete_phrase()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name' => 'Maricarmen',
            'email' => 'mchueco@mail.com',
            'password' => '12345678',
        ]);
        $this->actingAs($user);

        $phrase = $this->post(route('store'), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
        
        $response = $this->delete('/destroy/1');
        $this->assertDatabaseCount('phrases', 0);

        $response->assertStatus(302);
    }

    public function test_redirects_home_page_after_deleting()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name' => 'Maricarmen',
            'email' => 'mchueco@mail.com',
            'password' => '12345678',
        ]);
        $this->actingAs($user);

        $phrase = $this->post(route('store'), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
        
        $response = $this->followingRedirects('/home')
        ->get('/home')
        ->assertStatus(200);
    }
}
