<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        $posts = $query->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'author' => 'nullable|string|max:255',
            'status' => 'nullable|in:draft,published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_schema' => 'nullable|array',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string|max:2000',
        ]);

        $slug = $request->filled('slug') ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $imageUrl = $request->image_url;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blog', 'public');
            $imageUrl = Storage::disk('public')->url($path);
        }

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'excerpt' => $validated['excerpt'],
            'author' => $validated['author'] ?? 'Orion Star VIP Team',
            'status' => $validated['status'] ?? 'draft',
            'image_url' => $imageUrl,
            'meta_title' => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'meta_keywords' => $validated['meta_keywords'],
            'meta_schema' => isset($validated['meta_schema']) ? array_values(array_filter($validated['meta_schema'])) : null,
        ]);

        // Save FAQs
        if (!empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    Faq::create([
                        'post_id' => $post->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Post $post)
    {
        $post->load('faqs');
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'author' => 'nullable|string|max:255',
            'status' => 'nullable|in:draft,published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_schema' => 'nullable|array',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string|max:2000',
        ]);

        $imageUrl = $request->input('image_url', $post->image_url);
        if ($request->hasFile('image')) {
            if ($post->image_url && !str_contains($post->image_url, 'http')) { // Only delete if it's a local storage path, not an external URL (though our library also uses URLs)
                // Actually, if it's from our library, it's a full URL.
                // We should probably check if it starts with our app URL.
                $oldPath = str_replace(Storage::disk('public')->url(''), '', $post->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('blog', 'public');
            $imageUrl = Storage::disk('public')->url($path);
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'content' => $validated['content'],
            'excerpt' => $validated['excerpt'],
            'author' => $validated['author'] ?? 'Orion Star VIP Team',
            'status' => $validated['status'] ?? 'draft',
            'image_url' => $imageUrl,
            'meta_title' => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'meta_keywords' => $validated['meta_keywords'],
            'meta_schema' => isset($validated['meta_schema']) ? array_values(array_filter($validated['meta_schema'])) : null,
        ]);

        // Update FAQs - delete existing and create new ones
        $post->faqs()->delete();
        if (!empty($validated['faqs'])) {
            foreach ($validated['faqs'] as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    Faq::create([
                        'post_id' => $post->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'sort_order' => $index,
                    ]);
                }
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image_url) {
            $path = str_replace('/storage/', '', $post->image_url);
            Storage::disk('public')->delete($path);
        }
        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }
}
