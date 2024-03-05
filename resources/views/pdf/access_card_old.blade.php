<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> مركاز البلـد الأمـين </title>    
    <link rel="icon" href="{{ public_path('assets/img/logo.svg') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ public_path('assets/css/style.css') }}?v={{ env('APP_ASSETS_V') }}">
    <link rel="stylesheet" href="{{ public_path('assets/css/pdf.css') }}">
</head>
<body>

    <div class="pdf-page">
        <section class="main">
            <div class="container">

                <img class="main-logo" src="{{ public_path('assets/img/logo.svg') }}" alt="مركاز البلد الأمـين">

                <div class="pdf-hero-txt">
                    <h4 class="name"> {{ $content->guest_name }} </h4>
                    <h4 class="organisation"> {{ $content->job }} </h4>

                    <h3 class="title"> مبادرة مركاز البلد الأمــــــــــــــــــــين <br> تسعــــــــــــــــــــــــد بتشريفــــــــــــــــــــــــــــــــــك </h3>
                    <h5 class="sub-title"> في حضرة أصحاب المعالي والسعادة على مائدة الإفطار </h5>
                </div>

                <div class="event-info-container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-date.svg') }}" alt="" class="icon">
                                <h6> التاريخ </h6>
                                <p> {{ strip_tags($content->guest->date) }} </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-clock.svg') }}" alt="" class="icon">
                                <h6> فترة الحدث </h6>
                                <p> {{ strip_tags($content->guest->period) }} </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-date.svg') }}" alt="" class="icon">
                                <h6> الموقع </h6>
                                <p> <a href="{{ $content->guest->location_link }}"> اضغط هنا للوصول </a> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="qrcode-container">
                        <img src="{{ public_path('qrcode/' . $qr_code .'.png') }}" alt="" >
                    </div>
                </div>

            </div>
        </section>

        <div class="container">
            <hr class="home-line">
        </div>

        <section class="about">
            <div class="container">
                <h4> عن المبادرة </h4>
                <p> <span> تمثّل المبادرة جزءًا أساسيًا من استراتيجية تعزيز الشراكة </span> وتوطيد العلاقة مع أصحاب العلاقة في العاصمة المقدسة، نُقدم من خلالها منصة حوارية اتصالية فعالة تجمع، بين أصحاب المصلحة من أصحاب المعالي والمسؤولين ورجال الأعمال، بهدف تعــــــــــزيز
                    تبادل الآراء والخبرات، وتقديم بيئة تشجيعية للتعاون وفتح باب الشراكات والفرص في مجال الاستثمار والتنمية والتطوير لرفع مستوى جودة الحياة في المنطقة، وتعزيز التواصل الفعّال. </p>
                <a href="#" class="objectives-link"> انقر هنا للتعرّف أكثر </a>
            </div>
        </section>

        <section class="our-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <h6> مبادرة من </h6>
                    </div>
                    <div class="col-md-10">
                        <img src="{{ public_path('assets/img/row-1.png') }}" class="row-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        <h6> شريك التنظيم </h6>
                    </div>
                    <div class="col-md-10">
                        <img src="{{ public_path('assets/img/row-2.png') }}" class="row-img">
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="footer-content">
                        <h2> إحدى مبادرات </h2>
                        <img src="{{ public_path('assets/img/img-1.png') }}" alt="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p> جميع الحقوق محفوظة 2024 © </p>
                </div>
            </div>
        </footer>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>