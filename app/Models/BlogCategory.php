<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
    ];
    
    // public $timestamps = false;


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }


}
