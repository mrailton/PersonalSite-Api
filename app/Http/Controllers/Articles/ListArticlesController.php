<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListArticlesController
{
    public function __invoke(Request $request): JsonResource
    {
        if (auth('sanctum')->check()) {
            $articles = Article::all();
        } else {
            $articles = Article::query()->where('published_at', '<=', now())->get();
        }

        return ArticleResource::collection($articles);
    }
}
