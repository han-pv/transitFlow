<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\Banner;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'category' => 'nullable|string|max:30'
        ]);

        $f_category = $request->has('category') ? $request->category : null;

        $categories = BlogCategory::withCount('blogs')->get();

        $blogs = Blog::with('category')
            ->when(isset($f_category), function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->orderBy("created_at", "desc")
            ->paginate(10);

        $banner = Banner::where('section', 'blogs')
            ->select('image', 'title', 'section', 'text')
            ->first();

        return view("client.blogs.index")
            ->with([
                'blogs' => $blogs,
                'categories' => $categories,
                'banner' => $banner,
            ]);
    }

    public function show($slug)
    {
        $categories = BlogCategory::withCount('blogs')->get();
        $blog = Blog::whereSlug($slug)
            ->with('contents')
            ->firstOrFail();
        $banner = Banner::where('section', 'blogs')
            ->select('image', 'title', 'section')
            ->first();

        // dd($blog);

        return view("client.blogs.show")
            ->with(
                [
                    'blog' => $blog,
                    'categories' => $categories,
                    'banner' => $banner
                ]
            );
    }
}
