@extends('layouts.main')

@section('title', 'Blogs & Articles - Cindy Meadows')

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

@include('includes.blogs-section')

@endsection
