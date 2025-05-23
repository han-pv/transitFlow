<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('username')
            ->get();

        return view('admin.users.index')
            ->with([
                'users' => $users,
                'permissions' => $this->getPermissions(),
            ]);
    }

    public function create()
    {
        return view('admin.users.create')
            ->with([
                'permissions' => $this->getPermissions(),
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['string', 'max:50'],
            'username' => ['required', 'string', 'max:50', Rule::unique('users')],
            'password' => ['required', 'string', 'max:50'],
            'permissions' => ['nullable', 'array', 'min:0'],
            'permissions.*' => ['nullable', 'integer', 'min:1'],
        ]);

        $obj = new User();
        $obj->firstname = $request->firstname;
        $obj->lastname = $request->lastname;
        $obj->username = $request->username;
        $obj->password = bcrypt($request->password);
        $obj->permissions = $request->permissions ?: [];
        $obj->save();

        return to_route('admin.users.index')
            ->with([
                'success' => 'User added successfuly',
            ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')
            ->with([
                'user' => $user,
                'permissions' => $this->getPermissions(),
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['string', 'max:50'],
            'username' => ['required', 'string', Rule::unique('users')->ignore($id)],
            'password' => ['required', 'string', 'max:50'],
            'permissions' => ['nullable', 'array', 'min:0'],
            'permissions.*' => ['nullable', 'integer', 'min:1'],
        ]);

        $obj = User::findOrFail($id);
        $obj->firstname = $request->firstname;
        $obj->lastname = $request->lastname ? $request->lastname : null;
        $obj->username = $request->username;
        if (isset($obj->password)) {
            $obj->password = bcrypt($request->password);
        }
        $obj->permissions = $request->permissions ?: [];
        $obj->update();

        return to_route('admin.users.index')
            ->with([
                'success' => 'app.updated successfuly',
            ]);
    }

    public function destroy($id)
    {
        $obj = User::findOrFail($id);

        $obj->delete();

        return to_route('admin.users.index')
            ->with([
                'success' => 'users deleted successufly',
            ]);
    }

    private function getPermissions()
    {
        return [
            ['id' => 1, 'name' => 'team members'],
            ['id' => 2, 'name' => 'blogs'],
            ['id' => 3, 'name' => 'users'],
            ['id' => 4, 'name' => 'testimonials'],
            ['id' => 5, 'name' => 'contacts'],
            ['id' => 6, 'name' => 'banners'],
            ['id' => 7, 'name' => 'about'],
            ['id' => 8, 'name' => 'gallery'],
        ];
    }
}
