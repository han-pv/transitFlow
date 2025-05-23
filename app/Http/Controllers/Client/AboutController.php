<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use App\Models\Banner;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        // dd($about);
        $banner = Banner::where('section', 'about')
            ->select('image', 'title', 'section', 'text')
            ->first();
        $testimonials = Testimonial::orderBy("updated_at", "desc")
            ->take(4)
            ->get();
        return view("client.about.index")
            ->with([
                "banner" => $banner,
                "about" => $about,
                "testimonials" => $testimonials,
            ]);
    }
}
