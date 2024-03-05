@extends('layouts.app')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>
            <span class="navbar-text">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </span>
            </div>
        </div>
    </nav>

    <section class="main">
        <div class="container">

            @if($errors->any())
                <div class="alert alert-danger text-center nexa-light error-alert" role="alert">
                    {{ implode('', $errors->all(':message')) }}
                </div>
            @endif

            <img class="main-logo" src="{{ asset('assets/img/logo.svg') }}" alt="مركاز البلد الأمـين">

            <h3 class="title"> مبادرة مركــاز البلــــــد الأمـــــــــــــــــين تسعــــــــــــــــــــــــد بتشريفــــــــــــــــــــــــــــــــــك </h3>
            <h5 class="sub-title"> يمكنك صناعة رابط دعوة مخصص وفق التفاصيل المخصصة لكل جهة عبر هذه الصفحة </h5>


            <div class="row">
                <form id="invitationForm" class="booking" method="POST" action="{{ route('invitaion') }}">
                    @csrf

                    <div class="col-auto">
                        <input type="text" class="form-control" name="company_name" placeholder="اكتب اسم الجهة باللغة العربية" required>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" name="number" placeholder="عدد المدعوين" required>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="date" placeholder="التاريخ " required>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" name="period" placeholder="الفترة" required>
                    </div>
                    <div class="col-auto">
                        <input type="txt" class="form-control" name="location" placeholder="الموقع باللغة العربية" required>
                    </div>
                    <div class="col-auto">
                        <input type="url" class="form-control" name="location_link" placeholder="رابط الموقع في الخريطة" required>
                    </div>

                    <button type="button" id="submitForm" class="btn btn-primary"> أصدر رابط الدعوات <img class="link-icon" src="/assets/img/link-icon.svg" alt=""> </button>
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


@section('script')
<script>
    $(document).ready(function () {
        $('#submitForm').on('click', function () {
            $.ajax({
                url: $('#invitationForm').attr('action'),
                method: 'POST',
                data: $('#invitationForm').serialize(),
                success: function (data) {

                    var invitationLink = data.invitation_link;
                    // console.log(invitationLink);

                    // Display success message with SweetAlert
                    Swal.fire({
                        title: 'تم توليد رابط الدعوة بنجاح',
                        text: invitationLink,
                        icon: 'success',
                        confirmButtonText: 'الرجوع'
                    });
                },
                error: function (xhr, status, error) {
                    // Display error message with SweetAlert
                    Swal.fire({
                        title: 'حدث خطأ ما',
                        text: 'المرجو المحاوله من جديد',
                        icon: 'error',
                        confirmButtonText: 'الرجوع'
                    });
                }
            });
        });
    });
</script>
@endsection