@extends('layouts.app')
@section('content')

    <section class="main">
        <div class="container">

            <img class="main-logo" src="{{ asset('assets/img/logo.svg') }}" alt="مركاز البلد الأمـين">

            <h3 class="title"> {{ $guest->company_name }} </h3>
            <h5 class="sub-title"> يمكنك إرسال الدعوات وفق التفاصيل الموضحة أدناه، وستصل إلى الضيوف بشكل تلقائي </h5>

            <div class="event-info-container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="event-info">
                            <img src="{{ asset('assets/img/icon-date.svg') }}" alt="" class="icon">
                            <h6> التاريخ </h6>
                            <p> {{ strip_tags($guest->date) }} </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="event-info">
                            <img src="{{ asset('assets/img/icon-clock.svg') }}" alt="" class="icon">
                            <h6> فترة الحدث </h6>
                            <p> {{ strip_tags($guest->period) }} </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="event-info">
                            <img src="{{ asset('assets/img/icon-email.svg') }}" alt="" class="icon">
                            <h6> عدد الدعوات المتبقية </h6>
                            <p> {{ strip_tags($guest->number) }} </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="event-info">
                            <img src="{{ asset('assets/img/icon-location.svg') }}" alt="" class="icon">
                            <h6> الموقع </h6>
                            <p> <a href="{{ $guest->location_link }}"> اضغط هنا للوصول  </a> </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <form class="booking" method="POST" target="_blank" action="{{ route('guest-details-store') }}">
                    @csrf

                    <div class="col-auto col-alert">
                        <style>
                            .col-alert:before,
                            .col-alert:after{
                                display: none;
                            }
                            .col-alert .alert{
                                margin-bottom: 50px;
                            }
                        </style>
                        @if($errors->any() || session('error'))
                            <div class="alert alert-danger text-center nexa-light error-alert" role="alert">
                                @foreach($errors->all() as $error)
                                    {{ $error }} <br>
                                @endforeach
                                @if(session('error'))
                                    {{ session('error') }} <br>
                                @endif
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success text-center nexa-light success-alert" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>



                    <input type="hidden" name="guest_id" value="{{ $guest->id }}">

                    <div class="col-auto">
                        <input type="text" class="form-control" name="guest_name" placeholder="اسم الضيف" required>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="job" placeholder="الصفة (اختياري)" >
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="phone" placeholder="رقم التواصل" required>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني" required>
                    </div>
                    <button type="submit" class="btn btn-primary"> أرسل الدعوة <img src="{{ asset('assets/img/email.svg') }}" alt=""> </button>
                </form>
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
        </div>
    </section>

    <section class="objectives">
        <div class="container">
            <h4> مستهدفات المبادرة </h4>
            <!-- <img src="/assets/img/v-yellow.svg" alt=""> -->
            <p> <span> دعم وتمكين </span> القطاع الخاص بالاستفادة من الفرص الاستثمارية التنموية </p>
            <p> <span> تعزيز المحتوى المحلي </span> بجذب واستقطاب الفرص الاقتصادية والاستثمارية النوعية </p>
            <p> <span> إثراء المعرفة </span> من خلال منصة تفاعلية لتبادل الخبرات بين المستثمرين ورجال الأعمال </p>
            <p> <span> تحقيق الأثر </span> بتفعيل مشاركة القطاع الحكومي مما ينعكس على جودة الحياة </p>
            <a href="#" class="objectives-link"> انقر هنا للتعرّف أكثر </a>
        </div>
    </section>

@endsection