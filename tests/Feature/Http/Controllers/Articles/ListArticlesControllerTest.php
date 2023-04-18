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
        ->assertJsonPath('data.0.attributes.title', $articles[0]->title);
});

test('an unauthenticated user can not get a list of articles', function () {
    $response = $this->getJson('/articles');

    $response->assertStatus(401);
});
