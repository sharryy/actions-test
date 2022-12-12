<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $this->assertDatabaseCount('users', 0);

        $response = $this->post(route('user.store'), [
            'name'     => 'John Doe',
            'email'    => 'john@gmail.com',
            'password' => 'password',
        ])->assertOk();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name'  => 'John Doe',
            'email' => 'john@gmail.com',
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $this->assertDatabaseCount('users', 1);

        $response = $this->post(route('user.update', $user), [
            'name'     => 'John Doe',
            'email'    => 'changed@gmail.com',
            'password' => 'password',
        ])->assertOk();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name'  => 'John Doe',
            'email' => 'changed@gmail.com',
        ]);

    }
}
