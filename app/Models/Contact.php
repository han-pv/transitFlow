<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'city',
        'message',
        'ip_address',
        'user_agent',
        'is_responded',
    ];

    protected $casts = [
        'is_responded' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
