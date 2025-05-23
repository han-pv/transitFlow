<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('id', 'desc')
            ->paginate(50);

        return view('admin.team-members.index')
            ->with([
                'members' => $members,
            ]);
    }

    public function create()
    {
        $today = Carbon::today()->format('Y-m-d');
        return view('admin.team-members.create')
            ->with(['today' => $today]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'gender' => 'nullable|string|in:Male,Female',
            'role' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'phoneNumber' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'otherSocialName' => 'nullable|string|max:15',
            'otherSocial' => 'nullable|string|max:255',
            'isActive' => 'nullable|boolean',
            'birthDate' => 'required|date',
            'hireDate' => 'nullable|date',
        ]);
        // \Log::info('Request Data:', $request->all());

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('team_members_images', 'public')
            : null;

        $createdBy = auth()->check()
            ? trim(auth()->user()->firstname . ' ' . (auth()->user()->lastname ?? ''))
            : null;

        $member = TeamMember::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'role' => $request->role,
            'bio' => $request->bio,
            'image' => $imagePath ? Storage::url($imagePath) : null,
            'phone_number' => $request->phoneNumber,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'x' => $request->x,
            'other_social_name' => $request->otherSocialName,
            'other_social' => $request->otherSocial,
            'created_by' => $createdBy,
            'is_active' => $request->isActive,
            'birth_date' => $request->birthDate,
            'hire_date' => $request->hireDate,

        ]);
        return to_route('admin.team-members.show', $member->id)
            ->with([
                'success' => trans('app.teamMember') . ' ' . trans('app.added'),
            ]);
    }

    public function show(string $id)
    {
        $member = TeamMember::findOrFail($id);

        return view('admin.team-members.show')
            ->with(['member' => $member]);
    }

    public function edit(string $id)
    {
        $member = TeamMember::findOrFail($id);
        // dd($member);
        return view('admin.team-members.edit')
            ->with(['member' => $member]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'gender' => 'nullable|string|in:Male,Female',
            'role' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'phoneNumber' => 'nullable|string|max:25',
            'email' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'otherSocialName' => 'nullable|string|max:15',
            'otherSocial' => 'nullable|string|max:255',
            'isActive' => 'nullable|boolean',
            'birthDate' => 'required|date',
            'hireDate' => 'nullable|date',
        ]);
        $member = TeamMember::findOrFail($id);

        $imagePath = $member->image;

        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete(str_replace(Storage::url(''), '', $imagePath));
            }
            $imagePath = $request->file('image')->store('team_members_images', 'public');
            $imagePath = Storage::url($imagePath);
        }

        $member->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'gender' => $request->gender,
            'role' => $request->role,
            'bio' => $request->bio,
            'image' => $imagePath,
            'phone_number' => $request->phoneNumber,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'x' => $request->x,
            'other_social_name' => $request->otherSocialName,
            'other_social' => $request->otherSocial,
            'is_active' => $request->isActive ? "1" : "0",
            'birth_date' => $request->birthDate,
            'hire_date' => $request->hireDate,
        ]);

        return to_route('admin.team-members.show', $member->id)
            ->with([
                'success' => trans('app.teamMember') . ' ' . trans('app.updated'),
            ]);
    }
    public function destroy(string $id)
    {
        $member = TeamMember::findOrFail($id);

        if ($member->image) {
            Storage::disk('public')->delete(str_replace(Storage::url(''), '', $member->image));
        }

        $member->delete();

        return redirect()->route('admin.team-members.index')->with(['success' => trans('app.teamMember') . ' ' . trans('app.deleted')]);
    }

}
