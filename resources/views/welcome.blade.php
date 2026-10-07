@extends('layouts.main')

@section('title', 'Cindy Meadows Author Life Coach - Home')

@section('content')
    @php
        $amazon = DB::table('m_flag')->where('id', 4)->first();
    @endphp

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="banner-content wow fadeInDown" data-wow-delay="0.1s">
                        {!! $banner->description !!}
                        <a href="{{ $amazon->flag_value }}" target="_blank" class="btn btn-web">Buy From Amazon <svg
                                aria-hidden="true" class="e-font-icon-svg e-fab-amazon" viewBox="0 0 448 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M257.2 162.7c-48.7 1.8-169.5 15.5-169.5 117.5 0 109.5 138.3 114 183.5 43.2 6.5 10.2 35.4 37.5 45.3 46.8l56.8-56S341 288.9 341 261.4V114.3C341 89 316.5 32 228.7 32 140.7 32 94 87 94 136.3l73.5 6.8c16.3-49.5 54.2-49.5 54.2-49.5 40.7-.1 35.5 29.8 35.5 69.1zm0 86.8c0 80-84.2 68-84.2 17.2 0-47.2 50.5-56.7 84.2-57.8v40.6zm136 163.5c-7.7 10-70 67-174.5 67S34.2 408.5 9.7 379c-6.8-7.7 1-11.3 5.5-8.3C88.5 415.2 203 488.5 387.7 401c7.5-3.7 13.3 2 5.5 12zm39.8 2.2c-6.5 15.8-16 26.8-21.2 31-5.5 4.5-9.5 2.7-6.5-3.8s19.3-46.5 12.7-55c-6.5-8.3-37-4.3-48-3.2-10.8 1-13 2-14-.3-2.3-5.7 21.7-15.5 37.5-17.5 15.7-1.8 41-.8 46 5.7 3.7 5.1 0 27.1-6.5 43.1z">
                                </path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-author">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="boxes-banner wow fadeInUp" data-wow-delay="0.1s">
                        <div class="box-img">
                            <i class="fa-solid fa-ranking-star"></i>
                        </div>
                        <div class="box-content">
                            <h3> {{$page->name}}</h3>
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="boxes-banner wow fadeInUp" data-wow-delay="0.1s">
                        <div class="box-img">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div class="box-content">
                            <h3>{{$section[0]->value}}</h3>
                            {!! $section[1]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="boxes-banner wow fadeInUp" data-wow-delay="0.1s">
                        <div class="box-img">
                            <i class="fa-solid fa-users-line"></i>
                        </div>
                        <div class="box-content">
                            <h3>{{$section[2]->value}}</h3>
                            {!! $section[3]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="author-info wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ $section[4]->value }}" class="img-fluid autho-banner"
                            alt="Cindy Meadows Author">
                        <img src="{{ $section[5]->value }}" class="img-fluid bookcover"
                            alt="I Am Your Daughter Book Cover">
                        <div class="slider-review">
                            <div class="client-review owl-carousel owl-theme">
                                <div class="item">
                                    <div class="review-box">
                                        <i class="fa-solid fa-quote-right"></i>
                                        {!! $section[6]->value !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="author-about wow fadeInRight" data-wow-delay="0.1s">
                        <h4 class="unique-style">{{ $section[7]->value }}</h4>
                        {!! $section[8]->value !!}
                        <div class="author-name">
                            <img src="{{ asset('assets/images/author-01.jpg') }}" class="img-fluid"
                                alt="Cindy Meadows Profile">
                            <h5>Cindy Meadows <span class="d-block">Author</span></h5>
                            <a href="{{ route('about-author') }}" class="btn btn-web">Read More <i
                                    class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-book">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="author-about book-about wow fadeInRight" data-wow-delay="0.1s">
                        <h4 class="unique-style">{{ $section[9]->value }}</h4>
                        {!! $section[10]->value !!}
                        <div class="logo-slides">
                            <h5>Available On:</h5>
                            <div class="logo-carousel owl-carousel owl-theme">
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-01.webp') }}" class="img-fluid"
                                            alt="Store Logo 1">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-02.webp') }}" class="img-fluid"
                                            alt="Store Logo 2">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-03.webp') }}" class="img-fluid"
                                            alt="Store Logo 3">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-04.webp') }}" class="img-fluid"
                                            alt="Store Logo 4">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-05.webp') }}" class="img-fluid"
                                            alt="Store Logo 5">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-06.webp') }}" class="img-fluid"
                                            alt="Store Logo 6">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="logo-box">
                                        <img src="{{ asset('assets/images/logo-07.webp') }}" class="img-fluid"
                                            alt="Store Logo 7">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="author-name">
                            <a href="{{ route('about-book') }}" class="btn btn-web">Read More <i
                                    class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="{{$amazon->flag_value}}"
                                target="_blank" class="btn btn-web">Buy From Amazon <i
                                    class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="about-book-cover wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ $section[11]->value }}" class="img-fluid" alt="Book Cover">
                        <div class="author-name">
                            <div class="rating">
                                <h6>4.9</h6>
                                <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                        class="fa-solid fa-star"></i>
                                    <span>Rating On Amazon</span>
                                </p>
                            </div>
                            <div class="rating">
                                <h6>650+</h6>
                                <p>Copies Sold
                                    On Amazon</p>
                            </div>
                            <div class="rating">
                                <i class="fa-brands fa-youtube"></i>
                                <p>Watch Trailer
                                    On Youtube</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 p-0">
                    <div class="video-show">
                        <video width="100%" height="100%" muted autoplay controls loop>
                            <source src="{{ $section[12]->value }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inside-book">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="inside-book-content wow fadeInDown" data-wow-delay="0.1s">
                        <div class="author-about">
                            {!! $section[13]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="book-points wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[14]->value !!}
                    </div>
                    <div class="book-points wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[15]->value !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="book-points wow fadeInUp" data-wow-delay="0.1s">
                        <img src="{{ $section[16]->value }}" class="img-fluid"
                            alt="Book Cover Inside">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="book-points wow fadeInRight" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {{ $section[17]->value }}
                    </div>
                    <div class="book-points wow fadeInRight" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {{ $section[18]->value }}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="author-about wow fadeInLeft" data-wow-delay="0.1s">
                        <h4 class="unique-style">Testimonials</h4>
                        <h2>{{$section[19]->value}}</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="client-reviews-box wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="reviews-carousel owl-carousel owl-theme">
                            @foreach($testimonial as $t)
                            <div class="item">
                                <div class="explore-review">
                                    {!!$t->description!!}
                                    <h5>{{$t->title}} <span>{{$t->text2}}</span></h5>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="item">
                                <div class="explore-review">
                                    <p>
                                        This is a powerful and deeply human memoir. Cindy Meadows shares her story with
                                        courage and grace, and that honesty makes the book incredibly moving. I found
                                        myself thinking about certain passages long after reading them. It is emotional,
                                        thoughtful, and written with real heart. </p>
                                    <h5>Blaine Merritt <span>Reader</span></h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="explore-review">
                                    <p>
                                        I Am Your Daughter is the kind of book that stays with you long after you put it
                                        down. It is honest, deeply personal, and full of feeling. Cindy Meadows writes
                                        with such openness that I felt connected to her story from the very first page
                                        to the last. </p>
                                    <h5>Marlowe Kinsey <span>Reader</span></h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="explore-review">
                                    <p>
                                        This memoir pulled me in with its raw emotion and kept me turning the pages.
                                        There is pain in this story, but there is also strength, reflection, and heart.
                                        It feels real in a way that many books do not, and that is what makes it
                                        memorable. </p>
                                    <h5>Tobin Haskett <span>Reader</span></h5>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.blogs-section')

@endsection
