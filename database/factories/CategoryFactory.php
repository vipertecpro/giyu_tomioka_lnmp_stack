<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'name'        => fake()->name(),
            'slug'        => fake()->slug(),
            'description' => fake()->sentence(),
        ];
    }

    /**
     * Indicate that the category has a parent.
     *
     * @return $this
     */
    public function withParent(): self{
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Category::factory(),
            ];
        });
    }

    /**
     * Indicate that the category has children.
     *
     * @return $this
     */
    public function withChildren(): self
    {
        return $this->afterCreating(function (Category $category) {
            Category::factory()
                ->count(5)
                ->create([
                    'parent_id' => $category->id,
                ]);
        });
    }

}
