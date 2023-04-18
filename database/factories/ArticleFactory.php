<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'published_at' => $this->faker->dateTimeBetween('-3 years', '-2 days')
        ];
    }
}
