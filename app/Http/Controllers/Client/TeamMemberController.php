<?php

namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamMemberController extends Controller
{
    public function index()
    {
        $banner = Banner::where('section', 'team-members')
            ->select('image', 'title', 'section', 'text')
            ->first();
        $banner->section = 'Team members';

        $members = TeamMember::where('is_active', 1)
            ->orderBy("updated_at", "desc")
            ->paginate(9);

        // dd($banner);
        return view("client.team-members.index")
            ->with([
                "banner" => $banner,
                "members" => $members,
            ]);
    }
}
