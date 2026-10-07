@php
    $amazon = DB::table('m_flag')->where('id', 4)->first();
@endphp
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ route('home') }}"><img
                            src="{{ isset($logo) && $logo ? asset($logo->img_path) : asset('assets/images/logo.webp') }}"
                            class="img-fluid" alt="Cindy Meadows Logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('about-author') ? 'active' : '' }}"
                                    href="{{ route('about-author') }}">About the Author</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('about-book') ? 'active' : '' }}"
                                    href="{{ route('about-book') }}">
                                    About the Book
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('blogs') || request()->routeIs('blog.*') ? 'active' : '' }}"
                                    href="{{ route('blogs') }}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}"
                                    href="{{ route('contact-us') }}"> Contact Us</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <a href="{{ $amazon->flag_value }}" target="_blank" class="btn btn-web">Buy From Amazon
                                <svg aria-hidden="true" class="e-font-icon-svg e-fab-amazon" viewBox="0 0 448 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M257.2 162.7c-48.7 1.8-169.5 15.5-169.5 117.5 0 109.5 138.3 114 183.5 43.2 6.5 10.2 35.4 37.5 45.3 46.8l56.8-56S341 288.9 341 261.4V114.3C341 89 316.5 32 228.7 32 140.7 32 94 87 94 136.3l73.5 6.8c16.3-49.5 54.2-49.5 54.2-49.5 40.7-.1 35.5 29.8 35.5 69.1zm0 86.8c0 80-84.2 68-84.2 17.2 0-47.2 50.5-56.7 84.2-57.8v40.6zm136 163.5c-7.7 10-70 67-174.5 67S34.2 408.5 9.7 379c-6.8-7.7 1-11.3 5.5-8.3C88.5 415.2 203 488.5 387.7 401c7.5-3.7 13.3 2 5.5 12zm39.8 2.2c-6.5 15.8-16 26.8-21.2 31-5.5 4.5-9.5 2.7-6.5-3.8s19.3-46.5 12.7-55c-6.5-8.3-37-4.3-48-3.2-10.8 1-13 2-14-.3-2.3-5.7 21.7-15.5 37.5-17.5 15.7-1.8 41-.8 46 5.7 3.7 5.1 0 27.1-6.5 43.1z">
                                    </path>
                                </svg>
                            </a>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
