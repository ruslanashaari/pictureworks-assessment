<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserPostTest extends TestCase
{
    public function test_append_comment_existing_user()
    {
        $user = User::create([
            'name'      =>  'John Doe',
            'comments'  =>  'Software Developer'
        ]);

        $data = [
            'id'        =>  $user->id,
            'comments'  =>  ' and Investor',
            'password'  =>  '720DF6C2482218518FA20FDC52D4DED7ECC043AB'
        ];

        $response = $this->post('/user', $data);
        $response->assertStatus(200)
                    ->assertViewIs('index');

        $this->assertDatabaseHas('users', [
            'id'        =>  $user->id,
            'name'      =>  $user->name,
            'comments'  =>  $user->comments . ' and Investor',
        ]);
    }

    public function test_append_comment_non_existing_user()
    {
        $data = [
            'id'        =>  999,
            'comments'  =>  ' and Investor',
            'password'  =>  'sahdsadh77868'
        ];

        $response = $this->post('/user', $data);
        $response->assertStatus(200)
                    ->assertSeeText('No such user (999)');
    }
}
