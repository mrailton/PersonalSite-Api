<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateArticleController
{
    public function __invoke(StoreArticleRequest $request, string $uuid): JsonResource
    {
        $article = Article::query()->where('uuid', '=', $uuid)->first();

        if (!$article) {
            abort(404);
        }

        $article->update($request->validated());

        return ArticleResource::make($article);
    }
}
