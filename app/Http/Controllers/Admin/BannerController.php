<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.banners.index')
            ->with(['banners' => $banners]);
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banners.show')
            ->with(['banner' => $banner]);
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string|max:50|unique:banners,section',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'title' => 'required|string|max:150',
            'text' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('banner_images', 'public')
            : null;

        Banner::create([
            'section' => $request->section,
            'image' => $imagePath ? Storage::url($imagePath) : null,
            'title' => $request->title,
            'text' => $request->text,
            'is_active' => $request->is_active ?? true,
            'created_by' => auth()->check() ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? '')) : null,
        ]);

        return redirect()->route('admin.banners.index')
            ->with('success', trans('app.banner') . " " . trans("app.created"));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit')
            ->with(['banner' => $banner]);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $request->validate([
            'section' => 'required|string|max:50|unique:banners,section,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp',
            'title' => 'required|string|max:150',
            'text' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $banner->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $imagePath));
            }
            $imagePath = $request->file('image')->store('banner_images', 'public');
            $imagePath = Storage::url($imagePath);
        }

        $banner->update([
            'section' => $request->section,
            'image' => $imagePath,
            'title' => $request->title,
            'text' => $request->text,
            'is_active' => $request->is_active ?? true,
            'created_by' => auth()->check() ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? '')) : null,
        ]);

        return redirect()->route('admin.banners.show', $id)
            ->with('success', trans('app.banner') . " " . trans("app.updated"));
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->image) {
            Storage::disk('public')->delete(str_replace(Storage::url(''), '', $banner->image));
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', trans("app.banner") . " " . trans("app.deleted"));
    }
}