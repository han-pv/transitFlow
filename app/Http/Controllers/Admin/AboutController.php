<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        return view('admin.about.index')
            ->with([
                'about' => $about,
            ]);
    }

    public function edit()
    {
        $about = About::first();
        if (!$about) {
            return redirect()->route('about.index')->with('error');
        }
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'text' => 'nullable|string',
            'email' => 'nullable|string|email|max:100',
            'phone_number' => 'nullable|string|max:20',
            'second_phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:100',
            'locations' => 'nullable|numeric|min:0',
            'delivered_packages' => 'nullable|numeric|min:0',
            'satisfied_clients' => 'nullable|numeric|min:0',
            'owned_vehicles' => 'nullable|numeric|min:0',
        ]);

        $about = About::first();
        if (!$about) {
            return redirect()->route('admin.about.index')->with('error');
        }

        $about->update($request->only([
            'name',
            'text',
            'email',
            'phone_number',
            'second_phone_number',
            'address',
            'locations',
            'delivered_packages',
            'satisfied_clients',
            'owned_vehicles'
        ]));

        return to_route('admin.about.index')->with('success', trans('app.about') . ' ' . trans('app.updated'));
    }
}
