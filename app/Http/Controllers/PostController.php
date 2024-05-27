<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        return $this->postViews($request->search ? ["search"=> $request->search] : []);
    }

    public function show(string $slug, Post $post)
    {
        if ($post->slug !== $slug) {
            return to_route('posts.show', ['slug' => $post->slug, 'post' => $post->id]);
        }
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function postViews(array $filters)
    {
        return view('posts.index', [
            'posts' => Post::filters( $filters )->latest()->paginate(15),
        ]);
    }

}
