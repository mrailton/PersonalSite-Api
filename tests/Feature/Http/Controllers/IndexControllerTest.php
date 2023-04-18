<?php

declare(strict_types=1);

test('example', function () {
    $response = $this->getJson('/');

    $response
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'message' => 'All systems operational',
            ],
        ]);
});
