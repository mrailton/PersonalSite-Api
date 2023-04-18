<?php

declare(strict_types=1);

test('a registered user can authenticate with valid credentials', function () {
    $response = $this->postJson('/auth/authenticate', ['email' => 'joe.bloggs@example.com', 'password' => 'password']);

    $response
        ->assertStatus(201)
        ->assertJsonStructure(['access_token']);
});

test('a non-registered user can not authenticate', function () {
    $response = $this->postJson('/auth/authenticate', ['email' => 'no.email@example.com', 'password' => 'password']);

    $response
        ->assertStatus(422);
});
