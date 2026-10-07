@extends('layouts.main')

@section('title', 'Contact Us - Cindy Meadows')

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

    <section class="contact-pg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-info me-lg-0 wow fadeInRight" data-wow-delay="0.2s">
                        <a href="tel:{{ $phone->flag_value }}">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $phone->flag_value }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="contact-info ms-lg-0 wow fadeInLeft" data-wow-delay="0.2s">
                        <a href="mailto:{{ $email->flag_value }}">
                            <i class="fa-solid fa-envelope"></i>
                            <span>{{ $email->flag_value }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="contact-form wow fadeInUp" data-wow-delay="0.2s">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-12">
                                <h2>{{ $page->name }}</h2>
                                {!! $page->content !!}
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-book-cover">
                                    <img src="{{ $page->image }}" class="img-fluid" alt="Book Cover">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-book-form">
                                    <form id="contact-form" action="{{ route('contactUsSubmit') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Phone" required>
                                                </div>
                                                <div class="col-12">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="notes" class="form-control" rows="4" id="textarea" placeholder="Message" required></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-web drk-btn">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
