@extends('layouts.main')

@section('title', 'About the Author - Cindy Meadows')

@section('content')

    <section class="banner inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="banner-content wow fadeInDown" data-wow-delay="0.2s">
                        <h1>{{$page->page_name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-author inner-author-about">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="author-info wow fadeInLeft" data-wow-delay="0.2s">
                        <img src="{{ $page->image }}" class="img-fluid autho-banner"
                            alt="Cindy Meadows">
                        <img src="{{ $section[0]->value }}" class="img-fluid bookcover"
                            alt="I Am Your Daughter Book Cover">
                        <div class="slider-review">
                            <div class="client-review owl-carousel owl-theme">
                                <div class="item">
                                    <div class="review-box">
                                        <i class="fa-solid fa-quote-right"></i>
                                        {!! $section[1]->value !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="author-about wow fadeInRight" data-wow-delay="0.2s">
                        <h4 class="unique-style">{{$page->name}}</h4>
                        {!! $page->content !!}
                        <div class="author-name">
                            <img src="{{ asset('assets/images/author-01.jpg') }}" class="img-fluid" alt="Cindy Meadows">
                            <h5>Cindy Meadows <span class="d-block">Author</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-article innerbiography">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="author-about wow fadeInRight" data-wow-delay="0.2s">
                        <h2>{{$section[2]->value}}</h2>
                        {!! $section[3]->value !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
