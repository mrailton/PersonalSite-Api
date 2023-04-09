<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Articles\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use TiMacDonald\JsonApi\JsonApiResource;

class UpdateArticleController extends Controller
{
    public function __invoke(StoreArticleRequest $request, string $uuid): JsonApiResource
    {
        $article = Article::query()->where('uuid', '=', $uuid)->first();

        if (!$article) {
            abort(404);
        }

        $article->update($request->validated());

        return ArticleResource::make($article);
    }
}
