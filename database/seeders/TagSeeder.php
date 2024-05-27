<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect([
            'IA',
            'Apprentissage automatique',
            'Traitement du langage naturel',
            'Réseaux de neurones',
            'Vision par ordinateur',
            'Blockchain',
            'Internet des objets',
            'Big Data',
            'Cybersécurité',
            'Réalité virtuelle'
        ]);


        $tags->each(fn ($tag) => Tag::create([
            'name' => $tag,
            'slug' => Str::slug($tag),
        ]));
    }
}
