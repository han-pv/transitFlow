<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\About;
use App\Models\Banner;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();

        $banner = Banner::where('section', 'home')
            ->select('image', 'title', 'section', 'text')
            ->first();

        $testimonials = Testimonial::where('is_active', 1)
            ->orderBy("updated_at", "desc")
            ->take(4)
            ->get();

        $members = TeamMember::where("is_active", 1)
            ->orderBy("updated_at", "desc")
            ->take(6)
            ->get();

        $blogs = Blog::orderBy("created_at", "desc")
            ->take(3)
            ->get();

        return view("client.home.index")
            ->with([
                "banner" => $banner,
                "testimonials" => $testimonials,
                "members" => $members,
                "blogs" => $blogs,
                "about" => $about,
            ]);
    }
}
