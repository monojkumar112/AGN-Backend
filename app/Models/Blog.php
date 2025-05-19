<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;

class Blog extends Model implements CanVisit
{
    use HasVisits;
    protected $fillable = [
        'slug',
        'title',
        'short_description',
        'body',
        'thumbnail',
        'status',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category');
    }
}
