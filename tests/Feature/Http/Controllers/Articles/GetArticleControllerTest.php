<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Str;

test('any user can get an article by uuid', function () {
    $article = Article::inRandomOrder()->first();
    $res = $this->getJson('/articles/' . $article->uuid);

    $res->assertStatus(200)
        ->assertJsonPath('data.title', $article->title)
        ->assertJsonPath('data.content', $article->content);
});

test('any user can get an article by slug', function () {
    $article = Article::inRandomOrder()->first();
    $res = $this->getJson('/articles/' . $article->slug);

    $res->assertStatus(200)
        ->assertJsonPath('data.title', $article->title)
        ->assertJsonPath('data.content', $article->content);
});

test('an authenticated user can not get an article that does not exist', function () {
    $uuid = Str::uuid()->toString();
    $res = $this->actingAs(User::first())->getJson('/articles/' . $uuid);

    $res->assertStatus(404);
});
