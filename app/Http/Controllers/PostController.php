<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('tags')->published()->get()->pluck('tags')->flatten()->unique('id')->take(10);

        return view(
            'posts.index',
            [
                'posts' => $posts
            ]
        );
    }

    public function detail(Category $category)
    {
        $tags = Cache::remember('tags', now()->addDays(3), function () {
            return Post::published()->with('tags')->get()->pluck('tags')->flatten()->take(10);
        });
        $populars = Post::published()->withCategory($category->slug)->latest()->take(5)->get();

        return view(
            'posts.detail',
            [
                'category' => $category,
                'tags' => $tags,
                'populars' => $populars
            ]
        );
    }

    public function show(Category $category, Post $post)
    {
        $posts = Post::published()->latest()->take(5)->get();
        $populars = Post::published()->withCategory($category->slug)->latest()->take(5)->get();
        $relates = Post::published()->withCategory($category->slug)->latest()->take(5)->get();

        return view(
            'posts.show',
            [
                'post' => $post,
                'posts' => $posts,
                'populars' => $populars,
                'relates' => $relates,
            ]
        );
    }
}
