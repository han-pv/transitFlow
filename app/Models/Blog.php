<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'summary',
        'bg_image_path',
        'main_image_path',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
    
    public function contents()
    {
        return $this->hasMany(BlogContent::class)->orderBy('id');
    }

    public function getName()
    {
        return $this->name;
    }
}