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
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Your Email Here"
                                            required>
                                        <button class="btn btn-web"> Send <i class="fa-solid fa-envelope"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-12">
                <div class="footer-content">
                    <a href="index.php"><img src="images/logo.webp" class="img-fluid" alt=""></a>
                    <p>Cindy Meadows writes with honesty, heart, and compassion, sharing stories of memory,
                        resilience, and hope that stay with readers longer.</p>
                    <ul class="social-icon">
                        <li>
                            <a href="https://www.facebook.com/cindymeadowsofficial" target="_blank"><i
                                    class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/cindymeadowsofficial/" target="_blank"><i
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
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="about-the-author.php">
                                About the Author
                            </a>
                        </li>
                        <li>
                            <a href="about-the-book.php">
                                About the Book
                            </a>
                        </li>
                        <li>
                            <a href="blogs.php">
                                Blogs
                            </a>
                        </li>
                        <li>
                            <a href="contact-us.php">
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
                            <a href="mailto:cmead6677@gmail.com">
                                <i class="fa-solid fa-envelope"></i> cmead6677@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="tel:+1 (616) 201-6164">
                                <i class="fa-solid fa-phone"></i> +1 (616) 201-6164
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
                <p>Copyright © 2026 Cindy Meadows . All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>





<!-- Optional JavaScript; choose one of the two! -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="js/wow.min.js"></script>

<script>
    //>> Wow Animation Start <<//
    new WOW().init();

    //>> Nice Select Start <<//
</script>


<script>
    $('.client-review').owlCarousel({
        loop: false,
        dots: false,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.logo-carousel').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    });

    $('.reviews-carousel').owlCarousel({
        loop: true,
        dots: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
</script>

</body>


</html>