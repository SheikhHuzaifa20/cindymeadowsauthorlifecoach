@extends('layouts.main')

@section('title', 'About the Book - I Am Your Daughter by Cindy Meadows')

@section('content')

    <section class="banner inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="banner-content wow fadeInDown" data-wow-delay="0.2s">
                        <h1>{{ $page->page_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-book inner-book-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="author-about book-about wow fadeInRight" data-wow-delay="0.2s">
                        <h4 class="unique-style">{{ $page->page_name }}</h4>
                        <h2>{{ $page->name }}</h2>
                        {!! $page->content !!}
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
                            <a href="{{$amazon->flag_value}}"
                                target="_blank" class="btn btn-web">Buy From Amazon <i
                                    class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="about-book-cover wow fadeInLeft" data-wow-delay="0.2s">
                        <img src="{{ $page->image }}" class="img-fluid"
                            alt="I Am Your Daughter Cover">
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


    <section class="inside-book">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="inside-book-content wow fadeInDown" data-wow-delay="0.1s">
                        <div class="author-about">
                            <h4 class="unique-style">About The BOOK</h4>
                            {!! $section[0]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="book-points wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[1]->value !!}
                    </div>
                    <div class="book-points wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[2]->value !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="book-points wow fadeInUp" data-wow-delay="0.1s">
                        <img src="{{ $section[5]->value }}" class="img-fluid"
                            alt="Book Cover Inside">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="book-points wow fadeInRight" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[3]->value !!}
                    </div>
                    <div class="book-points wow fadeInRight" data-wow-delay="0.1s">
                        <div class="book-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        {!! $section[4]->value !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
