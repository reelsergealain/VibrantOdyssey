<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('comment');
    }

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

    public function comment(Post $post, Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'between:3,255'],
        ]);

        Comment::create([
            'content' => $validated['content'],
            'post_id' => $post->id,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('success', "Le post a bien ete posté...");
    }

}
