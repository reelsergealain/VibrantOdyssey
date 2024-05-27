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
        return $this->postViews(["tag"=> $tag]);
    }

    public function postViews(array $filters)
    {
        return view('posts.index', [
            'posts' => Post::filters( $filters )->latest()->paginate(15),
        ]);
    }
}
