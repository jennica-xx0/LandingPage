<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_initial',
        'position',
        'photo_path',
        'display_order',
    ];
}