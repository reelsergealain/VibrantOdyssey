<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        Post::factory(100)
            ->sequence(fn () => [
                'category_id' => $categories->random(),
            ])
            ->create()
            // ->each(function ($post) {
            //     $tags = Tag::all()->random(rand(0, 3));
            //     $post->tags()->attach($tags);
            // })
            ;
    }
}
