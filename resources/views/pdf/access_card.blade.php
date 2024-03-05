<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> مركاز البلـد الأمـين </title>    
    <link rel="icon" href="{{ public_path('assets/img/logo-y.svg') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ public_path('assets/css/style.css') }}?v={{ env('APP_ASSETS_V') }}">
    <link rel="stylesheet" href="{{ public_path('assets/css/pdf2.css') }}">
</head>
<body>

    <div class="pdf-page">
        <section class="main">
            <div class="container">

                <img class="main-logo" src="{{ public_path('assets/img/logo-y.svg') }}" alt="مركاز البلد الأمـين">

                <div class="pdf-hero-txt">

                    <h2 class="invitaion-name"> بطــاقــة الدخــول </h2>

                    <h6 class="guest-name"> <img src="{{ public_path('assets/img/v-motard.svg') }}" > <span> {{ $content->guest_name }} </span> <img src="{{ public_path('assets/img/v-motard.svg') }}" > </h6>

                    <h5 class="company"> {{ $content->guest->company_name }} </h5>

                    <h3 class="title"> نشكرك على تأكيد حضــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــورك </h3>
                    <h5 class="sub-title"> نرفق لــك رمز تأكيد الحضــــور لإبرازه عند البوابـــــــــــــــة </h5>
                </div>

                <div class="event-info-container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-n-date.svg') }}" alt="" class="icon">
                                <h6> {!! $content->guest->date !!} </h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-n-clock.svg') }}" alt="" class="icon">
                                <h6> {!! $content->guest->period !!}</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="event-info">
                                <img src="{{ public_path('assets/img/icon-n-date.svg') }}" alt="" class="icon">
                                <h6> {!! $content->guest->location !!} </h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="qrcode-container">
                        <h5> رمز التأكيد </h5>
                        <img src="{{ public_path('qrcode/' . $qr_code .'.png') }}" alt="" >
                    </div>
                </div>

            </div>
        </section>

        

        <section class="our-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <h6> مبادرة من </h6>
                    </div>
                    <div class="col-md-10">
                        <img src="{{ public_path('assets/img/row-n-1.png') }}" class="row-img">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        <h6> شريك التنظيم </h6>
                    </div>
                    <div class="col-md-10">
                        <img src="{{ public_path('assets/img/row-n-2.png') }}" class="row-img">
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>