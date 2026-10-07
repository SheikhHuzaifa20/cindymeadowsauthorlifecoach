@php
    $phone = DB::table('m_flag')->where('id', 1)->first();
    $email = DB::table('m_flag')->where('id', 2)->first();
    $copyright = DB::table('m_flag')->where('id', 3)->first();
    $facebook = DB::table('m_flag')->where('id', 6)->first();
    $instagram = DB::table('m_flag')->where('id', 7)->first();
@endphp

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="newsletter-form">
                    <div class="form-content">
                        <h5>Subscribe To Our</h5>
                        <h3>Newsletter</h3>
                    </div>
                    <div class="form-field">
                        <form id="newsletter-form" action="{{ route('newsletterSubmit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" name="newsletter_email" class="form-control"
                                            placeholder="Enter Your Email Here" required>
                                        <button type="submit" class="btn btn-web">Send <i
                                                class="fa-solid fa-envelope"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-12">
                <div class="footer-content">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.webp') }}" class="img-fluid"
                            alt="Cindy Meadows Logo"></a>
                    <p>Cindy Meadows writes with honesty, heart, and compassion, sharing stories of memory,
                        resilience, and hope that stay with readers longer.</p>
                    <ul class="social-icon">
                        <li>
                            <a href="{{ $facebook->flag_value }}" target="_blank"><i
                                    class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="{{ $instagram->flag_value }}" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="footer-content">
                    <h5>Quick Links</h5>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-author') }}">
                                About the Author
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about-book') }}">
                                About the Book
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blogs') }}">
                                Blogs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact-us') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="footer-content">
                    <h5>Contact info
                    </h5>
                    <ul>
                        <li>
                            <a href="mailto:{{ $email->flag_value }}">
                                <i class="fa-solid fa-envelope"></i> {{ $email->flag_value }}
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{ $phone->flag_value }}">
                                <i class="fa-solid fa-phone"></i> {{ $phone->flag_value }}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="footer-bottom">
                <p>{{ $copyright->flag_value }}</p>
            </div>
        </div>
    </div>
</footer>
