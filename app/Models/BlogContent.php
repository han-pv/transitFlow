<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model
{
    /** @use HasFactory<\Database\Factories\BlogContentFactory> */
    use HasFactory;
    protected $fillable = ['blog_id', 'type', 'content', 'image_path', 'order'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
