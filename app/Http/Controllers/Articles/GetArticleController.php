<?php

declare(strict_types=1);

namespace App\Http\Controllers\Articles;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function abort;

class GetArticleController
{
    public function __invoke(Request $request, string $uuid): JsonResource
    {
        $article = Article::query()->where('uuid', '=', $uuid)->first();

        if (!$article) {
            abort(404);
        }

        return ArticleResource::make($article);
    }
}
