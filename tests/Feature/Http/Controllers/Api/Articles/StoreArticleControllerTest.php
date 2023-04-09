<?php

declare(strict_types=1);

use App\Models\User;

test('an authenticated user can create a new article', function () {
    $res = $this->actingAs(User::first())->postJson('/api/articles', ['title' => 'This is a new article', 'content' => 'This is the content of a new post', 'published_at' => now()]);

    $res->assertStatus(201)
        ->assertJsonPath('data.attributes.title', 'This is a new article');
});
