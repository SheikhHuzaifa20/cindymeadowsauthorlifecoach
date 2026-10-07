<!-- Optional JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //>> Wow Animation Start <<//
    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }
</script>

<script>
    $(document).ready(function() {
        $('#contact-form, #newsletter-form').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const button = form.find('button[type="submit"]');
            const originalButtonHtml = button.html();
            button.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span> Sending...');

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method') || 'POST',
                data: form.serialize(),
                headers: { 'Accept': 'application/json' }
            }).done(function(response) {
                if (response.status) {
                    form[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank you!',
                        text: response.message,
                        confirmButtonText: 'Done',
                        confirmButtonColor: '#8B5E3C'
                    });
                } else if (response.saved) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Your request was saved',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#8B5E3C'
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Already subscribed',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#8B5E3C'
                    });
                }
            }).fail(function(xhr) {
                let message = 'Please try again in a moment.';
                let title = 'Message not sent';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    message = Object.values(xhr.responseJSON.errors).flat().join(' ');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                if (xhr.responseJSON && xhr.responseJSON.saved) {
                    title = 'Your message was saved';
                }

                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#8B5E3C'
                });
            }).always(function() {
                button.prop('disabled', false).html(originalButtonHtml);
            });
        });

        if ($('.client-review').length) {
            $('.client-review').owlCarousel({
                loop: false,
                dots: false,
                margin: 10,
                nav: false,
                responsive: {
                    0: { items: 1 },
                    600: { items: 1 },
                    1000: { items: 1 }
                }
            });
        }

        if ($('.logo-carousel').length) {
            $('.logo-carousel').owlCarousel({
                loop: true,
                dots: false,
                margin: 10,
                nav: false,
                responsive: {
                    0: { items: 2 },
                    600: { items: 4 },
                    1000: { items: 6 }
                }
            });
        }

        if ($('.reviews-carousel').length) {
            $('.reviews-carousel').owlCarousel({
                loop: true,
                dots: false,
                margin: 10,
                nav: true,
                responsive: {
                    0: { items: 1 },
                    600: { items: 2 },
                    1000: { items: 3 }
                }
            });
        }
    });
</script>
