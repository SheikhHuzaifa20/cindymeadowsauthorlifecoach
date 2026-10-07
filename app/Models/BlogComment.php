<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $table = 'blog_comments';
    protected $fillable = ['blog_id', 'name', 'email', 'website', 'comment', 'status'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
