<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use Carbon\Carbon;
use TiMacDonald\JsonApi\JsonApiResource;

class StoreArticleController extends Controller
{
    public function __invoke(StoreArticleRequest $request): JsonApiResource
    {
        $publishAt = Carbon::createFromTimeString($request->validated('published_at'))
            ->format('Y-m-d H:i:s');

        $article = auth()->user()->articles()->create([
            'title' => $request->validated('title'),
            'content' => $request->validated('content'),
            'published_at' => $publishAt,
        ]);

        return new ArticleResource($article);
    }
}
