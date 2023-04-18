<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Request $request): JsonResponse
    {
        return Response::success(data: ['api status' => 'up'], message: 'All systems operational');
    }
}
