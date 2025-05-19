<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaking extends Model
{
    use HasFactory;
    protected $fillable = [
        'testimonial',
        'inspiring_change',
        'topics_i_speak_on',
        'my_speaking_highlights',
        'why_book_me',
        'lets_inspire_together',
        'watch_now',
    ];
}
