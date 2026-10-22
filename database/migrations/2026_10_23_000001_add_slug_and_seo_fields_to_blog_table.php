<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->string('meta_title')->nullable()->after('slug');
            $table->text('meta_description')->nullable()->after('meta_title');
        });

        $knownSlugs = [
            'books-about-childhood-abuse-and-family-secrets-stories-of-silence-and-healing' => 'childhood-abuse-and-family-secrets',
            'books-about-childhood-trauma-and-healing-stories-of-recovery-and-hope' => 'books-about-childhood-trauma-and-healing',
            'books-about-trust-and-boundaries-after-trauma-a-journey-toward-healing' => 'trust-and-boundaries-after-trauma',
            'books-about-childhood-family-relationships-the-innocent-voice-of-a-child-in-a-troubled-home' => 'childhood-memoir-books',
            'from-abuse-to-trust-books-on-father-daughter-relationships-in-adulthood-for-survivors-of-childhood-trauma' => 'books-about-girlhood',
            'popular-books-about-childhood-family-trauma-a-comprehensive-reading-guide-for-survivors' => 'books-about-social-injustice',
        ];

        DB::table('blog')->whereNull('deleted_at')->orderBy('id')->get(['id', 'title'])->each(function ($blog) use ($knownSlugs) {
            $titleSlug = Str::slug($blog->title ?? '');
            if (isset($knownSlugs[$titleSlug])) {
                DB::table('blog')->where('id', $blog->id)->update(['slug' => $knownSlugs[$titleSlug]]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn(['slug', 'meta_title', 'meta_description']);
        });
    }
};