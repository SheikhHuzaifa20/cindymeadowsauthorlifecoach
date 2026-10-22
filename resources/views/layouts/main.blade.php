<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="XyKxT65yx_qyG4hrRxWwNN5ujMbXbYPqYVE9MW1UbUo">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @endif
    <title>@yield('title', 'Cindy Meadows Author Life Coach')</title>
    <link rel="canonical" href="@yield('canonical', 'https://cindymeadowsauthorlifecoach.com/' . trim(request()->path(), '/'))">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Cindy Meadows Author Life Coach')">
    @hasSection('meta_description')
        <meta property="og:description" content="@yield('meta_description')">
    @endif
    <meta property="og:image" content="{{ asset('assets/images/author-01.jpg') }}">
    <meta property="og:url" content="@yield('canonical', 'https://cindymeadowsauthorlifecoach.com/' . trim(request()->path(), '/'))">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TTP9EPVV2V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { window.dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-TTP9EPVV2V');
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BookStore",
        "name": "Cindy Meadows Author Life Coach",
        "image": "https://cindymeadowsauthorlifecoach.com/wp-content/uploads/2026/03/book-1919-2048x1977.png",
        "@id": "",
        "url": "https://cindymeadowsauthorlifecoach.com",
        "telephone": "+1 (616) 201-6164",
        "priceRange": "$ 12.99 - $ 18.99",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "755 E 16th St, Apt 108",
            "addressLocality": "Holland",
            "addressRegion": "MI",
            "postalCode": "49423",
            "addressCountry": "US"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 42.7840725,
            "longitude": -86.07510169999999
        },
        "sameAs": [
            "https://www.facebook.com/cindymeadowsofficial",
            "https://www.instagram.com/cindymeadowsofficial"
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Person",
        "name": "Cindy Meadows",
        "url": "https://cindymeadowsauthorlifecoach.com",
        "image": "https://cindymeadowsauthorlifecoach.com/wp-content/uploads/2026/03/img-2346-1.png",
        "jobTitle": "Writer",
        "worksFor": {
            "@type": "Organization",
            "name": "Independent Author"
        }
    }
    </script>

    @include('layouts.front.css')
    @yield('css')
</head>

<body>

    <style>
        @if (!empty($banner) && !empty($banner->image))
            .banner { background-image: url('{{ asset($banner->image) }}'); }
        @endif
    </style>

    @include('layouts.front.header')

    @yield('content')

    @include('layouts.front.footer')

    @include('layouts.front.scripts')
    @yield('js')

</body>

</html>
