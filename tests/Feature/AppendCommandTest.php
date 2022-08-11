<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class AppendCommandTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_with_existing_user()
    {
        $user = User::create([
            'name'      =>  'John Doe',
            'comments'  =>  'Name is John Doe'
        ]);

        $this->artisan('user:comment ' . $user->id . ' apple')
                ->expectsOutput('Ok')
                ->doesntExpectOutput('No such user (' . $user->id . ')')
                ->assertExitCode(0);

        $this->assertDatabaseHas('users', [
            'id'        =>  $user->id,
            'name'      =>  $user->name,
            'comments'  =>  $user->comments . ' apple',
        ]);
    }
}
