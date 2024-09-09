<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory()
        ->count(100)
        ->create()
        ->each(function (Blog $blog) {
            $blog->categories()->attach(Category::inRandomOrder()->first());
            $blog->tags()->attach(Tag::inRandomOrder()->limit(3)->get());
            Comment::factory()
                ->count(5)
                ->create([
                    'blog_id' => $blog->id,
                    'created_by' => User::inRandomOrder()->first()->id,
                ])
                ->each(function (Comment $comment) {
                    Comment::factory()
                        ->count(3)
                        ->create([
                            'created_by' => User::inRandomOrder()->first()->id,
                            'blog_id' => $comment->blog_id,
                            'parent_id' => $comment->id,
                        ]);
                });
        });
    }
}
