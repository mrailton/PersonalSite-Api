<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreArticleController
{
    public function __invoke(StoreArticleRequest $request): JsonResource
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
