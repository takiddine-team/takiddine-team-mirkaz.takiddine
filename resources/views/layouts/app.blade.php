<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> مركاز البلـد الأمـين </title>    
    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ env('APP_ASSETS_V') }}">

    
</head>
<body>

    @yield('content')
    
    <section class="our-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-4">
                    <h6> مبادرة من </h6>
                </div>
                <div class="col-md-10 col-xs-8">
                    <div class="owl-carousel owl-theme owl-carousel1">
                        <div class="item">
                            <img src="{{ asset('assets/img/img-1.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-2.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-3.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-4.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-5.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-6.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-4">
                    <h6> شريك التنظيم </h6>
                </div>
                <div class="col-md-10 col-xs-8">
                    <div class="owl-carousel owl-theme owl-carousel2">
                        <div class="item">
                            <img src="{{ asset('assets/img/img-7.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/img/img-8.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-content">
                    <h2> إحدى مبادرات </h2>
                    <img src="{{ asset('assets/img/img-1.png') }}" alt="">
                </div>
            </div>
            <hr>
            <div class="row">
                <p> جميع الحقوق محفوظة 2024 © </p>
            </div>
        </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.owl-carousel1').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
        $('.owl-carousel2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
    </script>
    @yield('script')
</body>

</html>