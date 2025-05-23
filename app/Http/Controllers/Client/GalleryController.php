<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use App\Models\Banner;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $pictures = Gallery::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $banner = Banner::where('section', 'gallery')
            ->select('image', 'title', 'section', 'text')
            ->first();
            $about = About::first();
        return view("client.gallery.index")
            ->with([
                "banner" => $banner,
                "pictures" => $pictures,
                "about"=> $about
            ]);
    }
}
