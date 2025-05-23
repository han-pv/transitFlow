<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy("created_at", "desc")
            ->paginate(50);

        return view('admin.gallery.index')
            ->with('galleries', $galleries);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active'=> 'nullable|boolean',
        ]);

        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('banner_images', 'public')
        : null;

        Gallery::create([
            'name' => $request->name,
            'image' => $imagePath ? Storage::url($imagePath) : null,
            'created_by' => auth()->check() ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? '')) : null,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', trans('app.picture') . " " . trans("app.added"));
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active'=> 'nullable|boolean',
        ]);

        $gallery = Gallery::findOrFail($id);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $imagePath));
            }
            $imagePath = $request->file('image')->store('gallery', 'public');
            $imagePath = Storage::url($imagePath);
        }

        $gallery->update([
            'name'=> $request->name,
            'image'=> $imagePath ? $imagePath : null,
            'is_active'=> $request->is_active,
            'created_by' => auth()->check() ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? '')) : null,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', trans('app.picture') . " " . trans("app.updated"));
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        };

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', trans('app.picture') . " " . trans("app.deleted"));
    }
}