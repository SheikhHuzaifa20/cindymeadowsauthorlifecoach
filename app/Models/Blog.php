<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'short_description', 'description', 'image', 'status', 'sort_order'];
    protected $dates = ['deleted_at'];

    public function sections()
    {
        return $this->hasMany(BlogSection::class, 'blog_id')->orderBy('sort_order');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')->where('status', 'approved')->latest();
    }

    public function allComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id')->latest();
    }
}