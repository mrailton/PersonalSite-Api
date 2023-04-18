<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\User;

test('an authenticated user can get a list of all articles', function () {
    $response = $this->actingAs(User::first())->getJson('/articles');

    $articles = Article::all();

    $response
        ->assertStatus(200)
        ->assertJsonCount(15, 'data')
        ->assertJsonPath('data.0.title', $articles[0]->title);
});

test('an unauthenticated user can get a list of published only articles', function () {
    $published1 = Article::query()->inRandomOrder()->first();
    $published2 = Article::query()->inRandomOrder()->first();
    $unpublished1 = Article::query()->inRandomOrder()->first();
    $unpublished2 = Article::query()->inRandomOrder()->first();
    $unpublished1->update(['published_at' => now()->addYear()]);
    $unpublished2->update(['published_at' => now()->addYear()]);

    $response = $this->getJson('/articles');

    $response
        ->assertStatus(200)
        ->assertJsonCount(13, 'data')
        ->assertSee($published1->title)
        ->assertSee($published2->uuid)
        ->assertDontSee($unpublished1->title)
        ->assertDontSee($unpublished2->uuid);
});
