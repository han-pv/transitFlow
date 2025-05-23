<?php

namespace App\Http\Controllers\Client;

use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $banner = Banner::where('section', 'contact')
            ->select('image', 'title', 'section', 'text')
            ->first();
        // dd($banner);
        return view("client.contacts.index")
            ->with([
                "banner" => $banner,
            ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|string|max:100',
            'phoneNumber' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');


        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'city' => $request->city,
            'message' => $request->message,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'is_responded' => false,
        ]);

        return redirect()->back()->with('success', trans('app.contactSuccessMessage'));
    }
}
