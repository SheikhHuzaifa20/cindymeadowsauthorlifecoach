@extends('layouts.main')

@section('title', $blog->title . ' - Cindy Meadows')

@section('content')

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
                        <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
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
