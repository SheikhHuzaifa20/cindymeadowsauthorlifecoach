<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    public const ALLOWED_SLUGS = [
        'books-about-childhood-family-relationships',
        'healing-the-father-wound-and-rebuilding-trust',
        'childhood-family-trauma-books-for-healing',
        'books-about-childhood-trauma-and-healing',
        'childhood-abuse-and-family-secrets',
        'trust-and-boundaries-after-trauma',
        'childhood-memoir-books',
        'books-about-girlhood',
        'books-about-social-injustice',
    ];

    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'meta_title', 'meta_description', 'short_description', 'description', 'image', 'status', 'sort_order'];
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