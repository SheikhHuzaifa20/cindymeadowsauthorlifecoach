<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    protected $table = 'blog_sections';

    protected $fillable = ['blog_id', 'label', 'slug', 'type', 'value', 'sort_order'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
