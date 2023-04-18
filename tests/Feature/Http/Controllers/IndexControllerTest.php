<?php

declare(strict_types=1);

test('example', function () {
    $response = $this->getJson('/');

    $response
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'api status' => 'up',
            ],
            'time' => now()->unix(),
            'statusCode' => 200,
            'message' => 'All systems operational',
        ]);
});
