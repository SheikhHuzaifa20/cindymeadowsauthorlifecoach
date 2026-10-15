@extends('layouts.main')

@section('title', 'Cindy Meadows Blogs | Parenting & Life Coaching Insights')
@section('meta_description', 'Insights from Cindy Meadows on parenting, childhood, healthy boundaries, personal growth, life coaching, resilience, and topics that support families, growth.')

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
