<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;

    // Add the fillable property to allow mass assignment
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'dob',
        'image',
    ];
}
