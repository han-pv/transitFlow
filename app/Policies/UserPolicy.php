<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function teamMembers(User $user): bool
    {
        return in_array(1, $user->permissions ?: []);
    }

    public function blogs(User $user): bool
    {
        return in_array(2, $user->permissions ?: []);
    }

    public function users(User $user): bool
    {
        return in_array(3, $user->permissions ?: []);
    }
    public function testimonials(User $user): bool
    {
        return in_array(4, $user->permissions ?: []);
    }
    public function contacts(User $user): bool
    {
        return in_array(5, $user->permissions ?: []);
    }
    public function banners(User $user): bool
    {
        return in_array(6, $user->permissions ?: []);
    }
    public function about(User $user): bool
    {
        return in_array(7, $user->permissions ?: []);
    }
    public function gallery(User $user): bool
    {
        return in_array(8, $user->permissions ?: []);
    }
}
