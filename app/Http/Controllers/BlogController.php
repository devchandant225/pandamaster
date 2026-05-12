<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->paginate(9);
        $recentPosts = Post::latest()->take(5)->get();

        return view('blog.index', compact('posts', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = Post::with(['faqs'])->where('slug', $slug)->firstOrFail();
        $recentPosts = Post::latest()->where('id', '!=', $post->id)->take(5)->get();

        return view('blog.show', compact('post', 'recentPosts'));
    }
}
