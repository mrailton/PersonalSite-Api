<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Articles;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

class ListArticlesController extends Controller
{
    public function __invoke(Request $request): JsonApiResourceCollection
    {
        $articles = Article::all();

        return ArticleResource::collection($articles);
    }
}
