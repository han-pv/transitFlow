<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'name',
        'text',
        'email',
        'phone_number',
        'second_phone_number',
        'address',
        'locations',
        'delivered_packages',
        'satisfied_clients',
        'owned_vehicles',
    ];
}
