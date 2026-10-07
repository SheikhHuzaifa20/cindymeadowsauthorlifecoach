@php
    $blog = DB::table('pages')->where('id', 3)->first();
    @endphp
<section class="blog-article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="author-about">
                    <h4 class="unique-style">{{$blog->name}}</h4>
                    {!! $blog->content !!}
                </div>
            </div>

            @isset($blogs)
                @forelse($blogs as $blog)
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="blog-main wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-img">
                                <a href="{{ route('blog.detail', \Illuminate\Support\Str::slug($blog->title)) }}">
                                    @if ($blog->image)
                                        <img src="{{ asset($blog->image) }}" class="img-fluid" alt="{{ $blog->title }}">
                                    @else
                                        <img src="{{ asset('assets/images/blog-01.png') }}" class="img-fluid"
                                            alt="{{ $blog->title }}">
                                    @endif
                                </a>
                            </div>
                            <div class="blog-content">
                                <h5>{{ $blog->created_at->format('d') }}
                                    <span class="d-block">{{ $blog->created_at->format('M') }}</span>
                                </h5>
                                <a href="{{ route('blog.detail', \Illuminate\Support\Str::slug($blog->title)) }}">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                @if ($blog->short_description)
                                    <p>{{ \Illuminate\Support\Str::limit($blog->short_description, 150) }}</p>
                                @elseif($blog->description)
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) }}</p>
                                @endif
                                <a href="{{ route('blog.detail', \Illuminate\Support\Str::slug($blog->title)) }}"
                                    class="btn btn-web drk-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>No blogs found. Check back soon!</p>
                    </div>
                @endforelse
            @endisset

        </div>
    </div>
</section>
