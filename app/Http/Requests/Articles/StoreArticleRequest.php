<?php

declare(strict_types=1);

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function auth;

class StoreArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', Rule::unique('articles', 'title')->ignore($this->uuid, 'uuid')],
            'content' => ['required', 'string'],
            'published_at' => ['sometimes', 'date', 'nullable'],
        ];
    }
}
