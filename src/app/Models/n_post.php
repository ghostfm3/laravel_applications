<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class n_post extends Model
{
    // use HasFactory;
    protected $fillable = ['todo', 'userid', 'deadline'];
}
