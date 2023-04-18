<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;

class Response
{
    public static function success(array $data, ?string $message = null): JsonResponse
    {
        return self::response(200, $data, $message);
    }

    public static function created(array $data, ?string $message = null): JsonResponse
    {
        return self::response(201, $data, $message);
    }

    public function error(array $data, ?string $message = null): JsonResponse
    {
        return self::response(400, $data, $message);
    }

    private static function response(int $status, array $data, ?string $message): JsonResponse
    {
        $content = [
            'data' => $data,
            'time' => now()->unix(),
            'statusCode' => $status,
        ];

        if ($message) {
            $content['message'] = $message;
        }

        return (new JsonResponse())->setStatusCode($status)->setData($content);
    }
}
