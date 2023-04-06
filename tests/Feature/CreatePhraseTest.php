<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Phrase;
use App\Models\User;

class CreatePhraseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_form_view()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/create');

        $response->assertStatus(200)
                 ->assertViewIs('create');
    }

    public function test_phrase_can_be_stored()
    {
        $this->withoutExceptionHandling();

        //scenario
        $phrases = Phrase::factory()->create([
            'phrase' => 'Hola mundo',
            'author' => 'Elvia',
            'image' => 'image.jpg'
        ]);
        //when
        //then
        $this->assertDatabaseCount('phrases', 1);
    }

    public function test_phrase_can_be_stored_by_auth_user()
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

        $this->assertDatabaseCount('phrases', 1);
    }

    public function test_phrase_created_is_in_db_table()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'name' => 'Maricarmen',
            'email' => 'mchueco@mail.com',
            'password' => '12345678',
        ]);
        $this->actingAs($user);

        $this->post(route('store'), [ 
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);

        $this->assertDatabaseHas('phrases', [
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
    }

    public function test_redirects_after_creating()
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
        $response = $this->followingRedirects('/show/1')
        ->get('/show/1')
        ->assertStatus(200);
    }

    public function test_phrase_can_be_displayed_after_creating()
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
        $this->assertDatabaseHas('phrases',[
            'id' => 1,
            'phrase' => 'Me has pillado en bragas',
            'author' => 'Maricarmen',
            'image' => 'bragas.jpg'
        ]);
        $response = $this->get('/show/1');
        $response->assertStatus(200);
    }

}
