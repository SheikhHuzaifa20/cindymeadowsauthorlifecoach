<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cindy Meadows Author Life Coach')</title>

    @include('layouts.front.css')
    @yield('css')
</head>

<body>

    <style>
        .banner {
            background-image: url({{ asset($banner->image) }});
        }
    </style>

    @include('layouts.front.header')

    @yield('content')

    @include('layouts.front.footer')

    @include('layouts.front.scripts')
    @yield('js')

</body>

</html>
