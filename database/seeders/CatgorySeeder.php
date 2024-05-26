<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatgorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = collect([
            'Python Tutorials',
            'JavaScript Tips',
            'Java Development',
            ' C++ Resources',
            'Web Development Insights'
        ]);

        $categories->each(fn ($tag) => Category::create([
            'name' => $tag,
            'slug' => Str::slug($tag),
        ]));
    }
}
