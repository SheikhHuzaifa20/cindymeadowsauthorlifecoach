@extends('layouts.main')

@php
    $articleSeo = [
        'books-about-childhood-trauma-and-healing' => [
            'title' => 'Books About Childhood Trauma and Healing: Cindy Meadows Story',
            'description' => "Books about childhood trauma and healing can offer validation, hope, and insight. See how Cindy Meadows' memoir, I Am Your Daughter, portrays silence and healing.",
            'alt' => 'Childhood Trauma and Healing',
        ],
        'childhood-abuse-and-family-secrets' => [
            'title' => 'Books About Childhood Abuse and Family Secrets | Cindy Meadows',
            'description' => "Cindy Meadows' memoir: I Am Your Daughter examines childhood abuse, family secrets, silence, and the difficult path toward healing, trust, and renewed self-worth.",
            'alt' => 'Childhood Abuse and Family Secrets',
        ],
        'trust-and-boundaries-after-trauma' => [
            'title' => 'Books About Trust and Boundaries After Trauma by Cindy Meadows',
            'description' => "Cindy Meadows' memoir, I Am Your Daughter, shows how childhood trauma shapes trust and boundaries, and how support can help survivors build safety and self-trust.",
            'alt' => 'Trust and Boundaries After Trauma',
        ],
        'books-about-childhood-family-relationships' => [
            'title' => 'Books About Childhood Family Relationships and Healing Stories',
            'description' => "Books about childhood family relationships reveal trauma, conflict, and healing through a child's voice in Cindy Meadows' memoir I Am Your Daughter with hope.",
            'alt' => 'Nostalgia’s Quiet Corner',
        ],
        'healing-the-father-wound-and-rebuilding-trust' => [
            'title' => 'Father–Daughter Relationships in Adulthood: Healing Bonds',
            'description' => 'Books on father–daughter relationships in adulthood reveal how childhood abuse and betrayal affect trust, boundaries, identity, and healing across adult life.',
            'alt' => 'The Healing of Memories',
        ],
        'childhood-family-trauma-books-for-healing' => [
            'title' => 'Childhood Family Trauma Books That Validate, Heal and Inspire',
            'description' => 'Popular books about childhood family trauma can validate painful experiences, explain lasting wounds, and offer survivors hope, healing, and a way forward.',
            'alt' => 'In Search of Peace',
        ],
        'childhood-memoir-books' => [
            'title' => 'Childhood Memoir Books: Stories of Growth, Memory and Family',
            'description' => 'These childhood memoir books share stories of family, identity, and resilience. Cindy Meadows’ I Am Your Daughter shows how early experiences shape adult lives.',
            'alt' => 'Childhood Memoir Books',
        ],
        'books-about-social-injustice' => [
            'title' => 'Books About Social Injustice: Childhood Views of Segregation',
            'description' => 'Cindy Meadows’ I Am Your Daughter shows how a child confronts racial segregation, questions family prejudice, and reveals injustice’s lasting impact in America.',
            'alt' => 'Books About Social Injustice',
        ],
        'books-about-girlhood' => [
            'title' => 'Books About Girlhood: Family Expectations Shape Girls’ Lives',
            'description' => 'Cindy Meadows’ I Am Your Daughter depicts girlhood shaped by family expectations, emotional neglect, and a daughter’s search for identity, voice, and belonging.',
            'alt' => 'Books About Girlhood',
        ],
    ];
    $requestedArticleSlug = request()->route('slug');
    $legacyArticleCanonical = [
        'the-difference-between-privacy-and-secrecy-teaching-children-healthy-boundaries' => 'https://cindymeadowsauthorlifecoach.com/blogs/privacy-vs-secrecy-children',
        'supporting-children-who-daydream-hidden-creativity-or-learning-gap' => 'https://cindymeadowsauthorlifecoach.com/blogs/children-daydream-creativity-learning',
        '7-warning-signs-your-child-may-be-experiencing-sexual-abuse-a-guide-for-parents-and-teacher' => 'https://cindymeadowsauthorlifecoach.com/blogs/child-sexual-abuse-warning-signs',
        'books-about-childhood-trauma-and-healing-stories-of-recovery-and-hope' => 'https://cindymeadowsauthorlifecoach.com/blogs/books-about-childhood-trauma-and-healing',
        'books-about-childhood-abuse-and-family-secrets' => 'https://cindymeadowsauthorlifecoach.com/blogs/childhood-abuse-and-family-secrets',
        'books-about-trust-and-boundaries-after-trauma-by-cindy-meadows' => 'https://cindymeadowsauthorlifecoach.com/blogs/trust-and-boundaries-after-trauma',
        'books-about-childhood-family-relationships-the-innocent-voice-of-a-child-in-a-troubled-home' => 'https://cindymeadowsauthorlifecoach.com/blogs/books-about-childhood-family-relationships',
        'from-abuse-to-trust-books-on-father-daughter-relationships-in-adulthood-for-survivors-of-childhood-trauma' => 'https://cindymeadowsauthorlifecoach.com/blogs/healing-the-father-wound-and-rebuilding-trust',
        'popular-books-about-childhood-family-trauma-a-comprehensive-reading-guide-for-survivors' => 'https://cindymeadowsauthorlifecoach.com/blogs/childhood-family-trauma-books-for-healing',
    ];
    $legacyArticleSlugs = [
        'the-difference-between-privacy-and-secrecy-teaching-children-healthy-boundaries' => 'privacy-vs-secrecy-children',
        'supporting-children-who-daydream-hidden-creativity-or-learning-gap' => 'children-daydream-creativity-learning',
        '7-warning-signs-your-child-may-be-experiencing-sexual-abuse-a-guide-for-parents-and-teacher' => 'child-sexual-abuse-warning-signs',
        'books-about-childhood-trauma-and-healing-stories-of-recovery-and-hope' => 'books-about-childhood-trauma-and-healing',
        'books-about-childhood-abuse-and-family-secrets' => 'childhood-abuse-and-family-secrets',
        'books-about-trust-and-boundaries-after-trauma-by-cindy-meadows' => 'trust-and-boundaries-after-trauma',
        'books-about-childhood-family-relationships-the-innocent-voice-of-a-child-in-a-troubled-home' => 'books-about-childhood-family-relationships',
        'from-abuse-to-trust-books-on-father-daughter-relationships-in-adulthood-for-survivors-of-childhood-trauma' => 'healing-the-father-wound-and-rebuilding-trust',
        'popular-books-about-childhood-family-trauma-a-comprehensive-reading-guide-for-survivors' => 'childhood-family-trauma-books-for-healing',
    ];
    $articlePath = $legacyArticleSlugs[$requestedArticleSlug] ?? $requestedArticleSlug;
    $articleMeta = $articleSeo[$articlePath] ?? null;
@endphp

@section('title', $articleMeta['title'] ?? $blog->title . ' - Cindy Meadows')
@if ($articleMeta)
    @section('meta_description', $articleMeta['description'])
@endif
@if (isset($legacyArticleCanonical[$requestedArticleSlug]))
    @section('canonical', $legacyArticleCanonical[$requestedArticleSlug])
@endif

@section('content')

<style>
    .main-blog-description h3 {
        color: black;
        font-size: 40px;
        font-weight: 400;
    }
</style>
<section class="banner inner-banner blog-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="banner-content">
                    <h1>{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blogs-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12">
                <div class="main-blog-description">

                    {{-- Main Blog Image --}}
                    @if($blog->image)
                        <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $articleMeta['alt'] ?? $blog->title }}">
                    @endif

                    {{-- Main Description --}}
                    @if($blog->description)
                        <div class="blog-main-content">
                            {!! $blog->description !!}
                        </div>
                    @endif

                    {{-- Dynamic Sections --}}
                    @foreach($blog->sections as $section)
                        <div class="blog-section-block">
                            @if($section->type === 'text')
                                <p>{{ $section->value }}</p>

                            @elseif($section->type === 'textarea')
                                <div class="blog-section-content">
                                    {!! $section->value !!}
                                </div>

                            @elseif($section->type === 'image')
                                @if($section->value)
                                    <figure class="blog-section-image">
                                        <img src="{{ asset($section->value) }}" class="img-fluid" alt="{{ $section->label }}">
                                        <figcaption>{{ $section->label }}</figcaption>
                                    </figure>
                                @endif

                            @elseif($section->type === 'video')
                                @if($section->value)
                                    <div class="blog-section-video">
                                        <video controls class="img-fluid w-100">
                                            <source src="{{ asset($section->value) }}">
                                        </video>
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endforeach

                    {{-- Leave a Reply Section --}}
                    <h3>Leave a Reply</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <div class="contact-book-form">
                        <form id="blog-comment-form" action="{{ route('blogCommentSubmit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Comment *</label>
                                        <textarea class="form-control" rows="5" id="textarea" name="comment" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" name="name" required maxlength="255">
                                    </div>
                                    <div class="col-12">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" name="email" required maxlength="255">
                                    </div>
                                    <div class="col-12">
                                        <label>Website</label>
                                        <input type="url" class="form-control" name="website" maxlength="255">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-web" id="post-comment-button" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="main-blog-description side-content-blog">
                    <div class="author-info-blog">
                        <img src="{{ asset('assets/images/blog-author-img.webp') }}" class="img-fluid" alt="Cindy Meadows">
                        <h5>Cindy Meadows</h5>
                        <p>Cindy Meadows is a writer who believes stories can help us make sense of the past and feel less alone in the present.</p>
                    </div>
                    <h5>Recent Posts</h5>
                    <ul class="recent-blog-listing">
                        @php
                            $recentBlogs = \App\Models\Blog::where('status', 1)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();
                        @endphp
                        @foreach($recentBlogs as $recent)
                            <li>
                                <div class="recent-blogs-post">
                                    <a href="{{ route('blog.detail', \Illuminate\Support\Str::slug($recent->title)) }}">
                                        @if($recent->image)
                                            <img src="{{ asset($recent->image) }}" class="img-fluid" alt="{{ $recent->title }}">
                                        @else
                                            <img src="{{ asset('assets/images/blog-01.png') }}" class="img-fluid" alt="{{ $recent->title }}">
                                        @endif
                                        <h6>{{ \Illuminate\Support\Str::limit($recent->title, 35) }}</h6>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    $('#blog-comment-form').on('submit', function (event) {
        event.preventDefault();

        const form = $(this);
        const button = $('#post-comment-button');
        button.prop('disabled', true).text('Submitting...');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            headers: { 'Accept': 'application/json' }
        }).done(function (response) {
            form[0].reset();
            Swal.fire({
                icon: 'success',
                title: 'Comment submitted',
                text: response.message,
                confirmButtonText: 'Done'
            });
        }).fail(function (xhr) {
            let message = 'Your comment could not be submitted. Please try again.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                message = Object.values(xhr.responseJSON.errors).flat().join('\n');
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'Unable to submit comment',
                text: message,
                confirmButtonText: 'OK'
            });
        }).always(function () {
            button.prop('disabled', false).text('Post Comment');
        });
    });
});
</script>
@endsection
