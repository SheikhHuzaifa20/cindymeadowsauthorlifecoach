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

    public function getSlugAttribute(): string
    {
        $titleSlug = \Illuminate\Support\Str::slug($this->title);

        return [
            'books-about-childhood-abuse-and-family-secrets-stories-of-silence-and-healing' => 'childhood-abuse-and-family-secrets',
            'books-about-childhood-trauma-and-healing-stories-of-recovery-and-hope' => 'books-about-childhood-trauma-and-healing',
            'books-about-trust-and-boundaries-after-trauma-a-journey-toward-healing' => 'trust-and-boundaries-after-trauma',
            'books-about-childhood-family-relationships-the-innocent-voice-of-a-child-in-a-troubled-home' => 'childhood-memoir-books',
            'from-abuse-to-trust-books-on-father-daughter-relationships-in-adulthood-for-survivors-of-childhood-trauma' => 'books-about-girlhood',
            'popular-books-about-childhood-family-trauma-a-comprehensive-reading-guide-for-survivors' => 'books-about-social-injustice',
        ][$titleSlug] ?? $titleSlug;
    }

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