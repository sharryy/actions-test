<?php

namespace Tests\Feature;

use App\Models\User;

it('can create a user', function () {
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
});

it('can update a user', function () {
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
});
