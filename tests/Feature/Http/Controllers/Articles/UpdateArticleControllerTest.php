<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\User;

test('an authenticated user can update an article', function () {
    $article = Article::inRandomOrder()->first();

    $res = $this->actingAs(User::first())->putJson('/articles/' . $article->uuid, ['title' => 'Updated Article', 'content' => $article->content, 'published_at' => $article->published_at]);

    $res->assertStatus(200)
        ->assertJsonPath('data.attributes.title', 'Updated Article');
});

test('an article can not be updated if it does not exist', function () {
    $res = $this->actingAs(User::first())->putJson('/articles/' . Str::uuid()->toString(), ['title' => 'Updated Article', 'content' => 'Some Content', 'published_at' => now()]);

    $res->assertStatus(404);
});
