<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $posts = Post::query()->with(['tags', 'category']);

        if ($search = $request->search)
        {
            $posts->where('title', 'LIKE', '%'. $search .'%')
            ->orWhere('description', 'LIKE', '%'. $search .'%');
        }

        return view('posts.index', [
            'posts' => $posts->latest()->paginate(10),
            // 'categories' => Category::all(),
        ]);
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

    public function postByCategory(Category $category)
    {

    }
}
