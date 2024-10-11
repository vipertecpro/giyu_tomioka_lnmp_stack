<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'             => fake()->sentence(),
            'slug'              => fake()->slug(),
            'excerpt'           => fake()->sentence(),
            'content'           => fake()->paragraphs(3, true),
            'created_by'        => 1,
            'updated_by'        => 1,
            'published_at'      => fake()->dateTime(),
            'published_by'      => 1,
        ];
    }
}
