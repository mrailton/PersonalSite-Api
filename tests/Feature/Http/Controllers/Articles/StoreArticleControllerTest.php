<?php

declare(strict_types=1);

use App\Models\User;

test('an authenticated user can create a new article', function () {
    $res = $this->actingAs(User::first())->postJson('/articles', ['title' => 'This is a new article', 'content' => 'This is the content of a new post', 'published_at' => now()]);

    $res->assertStatus(201)
        ->assertJsonPath('data.title', 'This is a new article');
});
