<?php

namespace App\Http\Controllers;

use Blaze\AdminCore\Models\Blog;
use Blaze\AdminCore\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $categories = BlogCategory::where('status', true)->orderBy('sort_order')->get();

        $blogsQuery = Blog::with(['category', 'author'])
            ->where('status', true)
            ->orderByDesc('created_at');

        if ($request->filled('category')) {
            $blogsQuery->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $blogsQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $blogs = $blogsQuery->paginate(9)->withQueryString();

        $featured = Blog::with(['category', 'author'])
            ->where('status', true)
            ->orderByDesc('created_at')
            ->first();

        return view('journal', compact('blogs', 'categories', 'featured'));
    }

    public function show(string $slug): View
    {
        $blog = Blog::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedBlogs = Blog::with(['category'])
            ->where('status', true)
            ->where('id', '!=', $blog->id)
            ->when($blog->blog_category_id, fn ($q) => $q->where('blog_category_id', $blog->blog_category_id))
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('journal-detail', compact('blog', 'relatedBlogs'));
    }
}
