<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    /** @use HasFactory<\Database\Factories\TeamMemberFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'role',
        'bio',
        'image',
        'phone_number',
        'email',
        'instagram',
        'facebook',
        'x',
        'other_social_name',
        'other_social',
        'created_by',
        'birth_date',
        'hire_date',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'birth_date' => 'date',
        'hire_date' => 'date',
    ];
}
