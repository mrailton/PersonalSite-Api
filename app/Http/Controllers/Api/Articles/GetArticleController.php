<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use function abort;

class GetArticleController extends Controller
{
    public function __invoke(Request $request, string $uuid): JsonApiResource
    {
        $article = Article::query()->where('uuid', '=', $uuid)->first();

        if (!$article) {
            abort(404);
        }

        return ArticleResource::make($article);
    }
}
