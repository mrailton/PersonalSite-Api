<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

/**
 * @mixin Article
 */
class ArticleResource extends JsonApiResource
{
    public function toId(Request $request): string
    {
        return $this->uuid;
    }

    public function toAttributes(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
