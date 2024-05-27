<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class PostByTagController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Tag $tag)
    {

        return view('posts.index', [
            'posts' => Post::whereRelation('tags', 'tags.id', $tag->id)->latest()->paginate(15),
        ]);
    }
}
