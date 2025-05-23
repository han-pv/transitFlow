<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'firstname',
        'lastname',
        'rating',
        'comment',
        'image',
        'title',
        'company',
        'location',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
    ];
}
