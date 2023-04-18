<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Str;

test('an authenticated user can get an article', function () {
    $article = Article::inRandomOrder()->first();
    $res = $this->actingAs(User::first())->getJson('/articles/' . $article->uuid);

    $res->assertStatus(200)
        ->assertJsonPath('data.title', $article->title)
        ->assertJsonPath('data.content', $article->content);
});

test('an authenticated user can not get an article that does not exist', function () {
    $uuid = Str::uuid()->toString();
    $res = $this->actingAs(User::first())->getJson('/articles/' . $uuid);

    $res->assertStatus(404);
});
