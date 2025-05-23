<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy("created_at","desc")
        ->paginate(50);

        return view("admin.testimonials.index")
            ->with(
                ['testimonials' => $testimonials]
            );
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'title' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'isActive' => 'nullable|boolean',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('testimonials_images', 'public')
            : null;

        $createdBy = auth()->check()
            ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? ''))
            : null;

        $testimonial = Testimonial::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'image' => $imagePath ? Storage::url($imagePath) : null,
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'is_active' => $request->isActive,
            'created_by' => $createdBy,
        ]);

        return to_route('admin.testimonials.show', $testimonial->id)
            ->with([
                'success' => trans('app.testimonial') . ' ' . trans('app.added'),
            ]);
    }

    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show')
        ->with(['testimonial' => $testimonial]);
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit')
        ->with(['testimonial' => $testimonial]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'title' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'isActive' => 'nullable|boolean',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                $oldImage = str_replace(Storage::url(''), '', $testimonial->image);
                Storage::disk('public')->delete($oldImage);
            }
            $imagePath = Storage::url($request->file('image')->store('testimonials_images', 'public'));
        }

        $updatedBy = auth()->check()
            ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? ''))
            : null;

        $testimonial->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'image' => $imagePath,
            'title' => $request->title,
            'company' => $request->company,
            'location' => $request->location,
            'is_active' => $request->isActive,
            'updated_by' => $updatedBy,
        ]);

        return to_route('admin.testimonials.show', $testimonial->id)
            ->with([
                'success' => trans('app.testimonial') . ' ' . trans('app.updated'),
            ]);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image) {
            $imagePath = str_replace(Storage::url(''), '', $testimonial->image);
            Storage::disk('public')->delete($imagePath);
        }

        $testimonial->delete();

        return to_route('admin.testimonials.index')
            ->with([
                'success' => trans('app.testimonial') . ' ' . trans('app.deleted'),
            ]);
    }
}
