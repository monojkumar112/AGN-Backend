<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Model;

class Course extends Model implements CanVisit
{
    use HasVisits;
    protected $fillable = [
        'slug',
        'name',
        'message',
        'description',
        'short_description',
        'duration',
        'total_time',
        'price',
        'discount_price',
        'course_summary',
        'image',
        'status',
    ];
}
