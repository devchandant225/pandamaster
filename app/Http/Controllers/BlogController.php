<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category')->latest();

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->paginate(9);
        $categories = Category::withCount('posts')->get();
        $recentPosts = Post::latest()->take(5)->get();

        return view('blog.index', compact('posts', 'categories', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'faqs'])->where('slug', $slug)->firstOrFail();
        $recentPosts = Post::latest()->where('id', '!=', $post->id)->take(5)->get();
        $categories = Category::withCount('posts')->get();

        return view('blog.show', compact('post', 'recentPosts', 'categories'));
    }
}
