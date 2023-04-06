<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\PhraseSeeder;
use App\Models\Phrase;
use App\Models\User;

class UpdatePhrase extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_edit_form_view_displays()
    {

        $this->withoutExceptionHandling();

        $this->seed(PhraseSeeder::class);

        $response = $this->get('/edit/1');
        $response->assertViewIs('edit');
    }

    public function test_phrase_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name' => 'Maricarmen',
            'email' => 'mchueco@mail.com',
            'password' => '12345678',
        ]);
        $this->actingAs($user);
        
        $this->post(route('store'), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);

        $phrase = Phrase::first();
        $response = $this->patch(route('update', $phrase->id), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en tanga',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
        $phrase = $phrase->fresh();
        
        $response->assertStatus(302);
        $this->assertEquals('Me has pillado en tanga', $phrase->phrase);
    }

    public function test_redirects_after_updating()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name' => 'Maricarmen',
            'email' => 'mchueco@mail.com',
            'password' => '12345678',
        ]);
        $this->actingAs($user);

        $this->post(route('store'), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);

        $phrase = Phrase::first();
        $response = $this->patch(route('update', $phrase->id), [ 
            'id' => 1,
            'phrase' => 'Me has pillado en tanga',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
        $phrase = $phrase->fresh();

        $response = $this->followingRedirects('/show/1')
        ->get('/show/1')
        ->assertStatus(200);
    }
}
