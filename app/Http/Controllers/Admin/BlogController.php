<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogContent;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'user')
            ->orderBy("created_at", "desc")
            ->paginate(50);

        return view("admin.blogs.index")
            ->with(
                ['blogs' => $blogs]
            );
    }

    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)
            ->with('contents')
            ->firstOrFail();

        return view("admin.blogs.show")
            ->with(
                ['blog' => $blog]
            );
    }

    public function create()
    {
        $categories = BlogCategory::get();
        return view('admin.blogs.create')
            ->with(
                ['categories' => $categories]
            );
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoryId' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'bgImage' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'mainImage' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'contents' => 'required|array',
            'contents.*.type' => 'required|string|in:heading,text,quote,image',
            'contents.*.body' => 'nullable|string',
            'contents.*.image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $slug = $this->generateUniqueSlug($request->title);

        $bgImagePath = $request->hasFile('bgImage')
            ? $request->file('bgImage')->store('blog_images/bg_images', 'public')
            : null;

        $mainImagePath = $request->hasFile('mainImage')
            ? $request->file('mainImage')->store('blog_images/main_images', 'public')
            : null;


        $blog = Blog::create([
            'user_id' => auth()->id(),
            'category_id' => $request->categoryId,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'bg_image_path' => $bgImagePath ? Storage::url($bgImagePath) : null,
            'main_image_path' => $mainImagePath ? Storage::url($mainImagePath) : null,
        ]);

        foreach ($request->contents as $content) {
            $contentImagePath = isset($content['image'])
                ? $content['image']->store('blog_images/content_images', 'public')
                : null;

            if (!empty($content['body']) || $contentImagePath) {
                $blog->contents()->create([
                    'type' => $content['type'],
                    'content' => $content['body'] ?? null,
                    'image_path' => $contentImagePath ? Storage::url($contentImagePath) : null,
                ]);
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successufly!');
    }
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::get();
        $blog->load('contents');

        return view('admin.blogs.edit')->with(
            [
                'blog' => $blog,
                'categories' => $categories,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoryId' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'bgImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'mainImage' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'contents' => 'required|array',
            'contents.*.id' => 'nullable|exists:blog_contents,id',
            'contents.*.type' => 'required|string|in:heading,text,quote,image',
            'contents.*.body' => 'nullable|string',
            'contents.*.image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        $slug = $this->generateUniqueSlug($request->title);

        $bgImagePath = $blog->bg_image_path;
        if ($request->hasFile('bgImage')) {

            if ($bgImagePath) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $bgImagePath));
            }
            $bgImagePath = $request->file('bgImage')->store('bg_images', 'public');
            $bgImagePath = Storage::url($bgImagePath);
        }

        $mainImagePath = $blog->main_image_path;
        if ($request->hasFile('mainImage')) {
            if ($mainImagePath) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $mainImagePath));
            }
            $mainImagePath = $request->file('mainImage')->store('main_images', 'public');
            $mainImagePath = Storage::url($mainImagePath);
        }

        $blog->update([
            'user_id' => auth()->id(),
            'category_id' => $request->categoryId,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'bg_image_path' => $bgImagePath,
            'main_image_path' => $mainImagePath,
        ]);

        $existingContentIds = $blog->contents->pluck('id')->toArray();
        $submittedContentIds = array_filter(array_column($request->contents, 'id'));

        $contentsToDelete = array_diff($existingContentIds, $submittedContentIds);
        foreach ($contentsToDelete as $contentId) {
            $content = $blog->contents()->find($contentId);
            if ($content && $content->image_path) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $content->image_path));
            }
            $content?->delete();
        }

        foreach ($request->contents as $content) {
            $contentImagePath = null;
            if (isset($content['image'])) {
                $contentImagePath = $content['image']->store('content_images', 'public');
                $contentImagePath = Storage::url($contentImagePath);
            }

            if (!empty($content['body']) || $contentImagePath) {
                $data = [
                    'type' => $content['type'],
                    'content' => $content['body'] ?? null,
                    'image_path' => $contentImagePath,
                ];

                if (isset($content['id']) && $blog->contents()->find($content['id'])) {
                    // Mevcut içeriği güncelle
                    $existingContent = $blog->contents()->find($content['id']);
                    if ($contentImagePath && $existingContent->image_path) {
                        // Eski içeriğin resmini sil
                        Storage::disk('public')->delete(str_replace(Storage::url(''), '', $existingContent->image_path));
                    }
                    $existingContent->update($data);
                } else {
                    // Yeni içerik ekle
                    $blog->contents()->create($data);
                }
            }
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfuly!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->bg_image_path) {
            Storage::disk('public')->delete(str_replace(Storage::url(''), '', $blog->bg_image_path));
        }

        if ($blog->main_image_path) {
            Storage::disk('public')->delete(str_replace(Storage::url(''), '', $blog->main_image_path));
        }

        foreach ($blog->contents as $content) {
            if ($content->image_path) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $content->image_path));
            }
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successufly!');
    }
    protected function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        return $slug;
    }
}
