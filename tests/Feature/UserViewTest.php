<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserViewTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_existing_user()
    {
        $user = User::create([
            'name'      =>  'John Doe',
            'comments'  =>  'Name is John Doe'
        ]);

        $response = $this->get('/user/' . $user->id);
        $response->assertStatus(200)
                    ->assertViewIs('index');
    }

    public function test_non_existing_user()
    {
        $response = $this->get('/user/99');
        $response->assertStatus(200)
                    ->assertSeeText('No such user (99)');
    }
}
