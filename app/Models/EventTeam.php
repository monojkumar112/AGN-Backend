<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'logo',
        'image',
        'status',
    ];
}
