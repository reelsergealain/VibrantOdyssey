<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();
        $description = $this->faker->paragraphs(5, true);
        $created_at = $this->faker->dateTimeBetween('-1 year');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => Str::limit($description, 150),
            'description' => $description,
            'thumbnail' => "https://picsum.photos/id/".$this->faker->numberBetween(50, 300)."/200/300",
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
