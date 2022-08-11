<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class AppendCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_with_existing_user()
    {
        $user = User::create([
            'name'      =>  'John Doe',
            'comments'  =>  'Name is John Doe',
            'password'  =>  bcrypt('720DF6C2482218518FA20FDC52D4DED7ECC043AB')
        ]);

        $this->artisan('user:comment ' . $user->id . ' apple')
                ->expectsOutput('OK')
                ->doesntExpectOutput('No such user (' . $user->id . ')')
                ->assertExitCode(0);

        $this->assertDatabaseHas('users', [
            'id'        =>  $user->id,
            'name'      =>  $user->name,
            'comments'  =>  $user->comments . ' apple',
        ]);
    }

    public function test_with_non_existing_user()
    {
        $this->artisan('user:comment 99 apple')
                ->expectsOutput('No such user (99)')
                ->doesntExpectOutput('OK')
                ->assertExitCode(0);
    }
}
