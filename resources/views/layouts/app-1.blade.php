<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Done platform - منصة دَن</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/assets/done-logo.svg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?v={{ env('APP_ASSETS_V') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}?v={{ env('APP_ASSETS_V') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?v={{ env('APP_ASSETS_V') }}" rel="stylesheet">
</head>
<body>

    <div id="loading">
        <div class="loading-div">
            <i id="loading-image" class="fas fa-circle-notch" alt="Loading..." ></i>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger text-center nexa-light error-alert" role="alert">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif

    <datalist id="ClientsList">
        @foreach( $clients as $client )
            <option value="{{ $client->name }}" data-name="{{ $client->name_en }}" data-tax="{{ $client->tax }}" data-crn="{{ $client->crn }}" data-country="{{ $client->country }}" data-address="{{ $client->address }}">
        @endforeach
    </datalist>

    <div id="app">
        <div class="fix_top">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/main-logo.svg') }}" class="main-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto to-right">
                            @auth
                                @if( auth()->user()->id == 20 || auth()->user()->id == 23 )
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::segment(1) === null ? 'active' : null }}" href="/"><i class="fas fa-home"></i> المنصة</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::segment(1) === 'users' ? 'active' : null }}" href="{{ route('users.index') }}"><i class="fas fa-users"></i> الأعضاء</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::segment(1) === 'clients' ? 'active' : null }}" href="{{ route('clients.index') }}"><i class="fas fa-people-arrows"></i> العملاء</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::segment(1) === 'history' ? 'active' : null }}" href="{{ route('history.index') }}"><i class="fas fa-archive"></i> الأرشيف</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::segment(1) === 'history' ? 'active' : null }}" href="{{ route('history.index') }}"><i class="fas fa-archive"></i> الأرشيف</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-md-12">
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <main class="py-4">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif(session('alert'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('alert') }}
                </div>
            @endif
            

            <div class="container">
                @if( Request::is('qubbah/*') )
                    <style> li.step.active::before { border-bottom: 15px solid #d04055 !important; border-top: 15px solid #d04055 !important; } li.step.active { background: #d04055 !important; } .steps .step:hover { background: #d04055 !important; } .steps .step:hover::before { border-top-color: #d04055 !important; border-bottom-color: #d04055 !important; } .steps .step:hover::after { border-right-color: #d04055 !important; } @media (max-width: 600px) and (min-width: 0px) { .steps .step:last-child::after { border-right: 15px solid #d04055 !important; } } </style>
                @endif
                @if( Request::is('*/form/*') )
                    <div class="breadcrumbs">
                        <ul class="steps">
                            <li class="step">
                                <a href="/"> <i class="fas fa-home"></i> </a>
                            </li>
                            <li class="step">
                                <a href="{{ url()->previous() }}" > {{ $br_title }} </a>
                            </li>
                            <li class="step">
                                <a href="{{ url()->previous() }}" > {{ $br_title_1 }} </a>
                            </li>
                            <li class="step active">
                                <a> {{ $br_active_title }} </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>

            @yield('content')

            <div class="heartbeat"></div>
        </main>

        <div class="div-alert-error">

        </div>
    </div>

    <footer class="animate__animated animate__fadeInUp">
        <div class="container">
            <div class="row">
                <div class="footer-top">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 offset-4 FooterInfo text-center">
                                <img src="{{ asset('img/assets/done-logo.svg') }}" class="footer-logo">
                                <a href="mailto:info@done-house.com" class="footer-mail">Info@done-house.com</a>
                                <ul class="social_footer_last_last">
                                    <li class="social-media-icon"><a href="https://wa.me/+966567173705"><i class="fab fa-whatsapp"></i></a></li>
                                    <li class="social-media-icon"><a href="https://twitter.com/eskelah"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-media-icon"><a href="https://behance.net/eskelah"><i class="fab fa-behance"></i></a></li>
                                    <li class="social-media-icon"><a href="https://www.vimeo.com/eskelah"><i class="fab fa-vimeo"></i></a></li>
                                    <li class="social-media-icon"><a href="https://www.instagram.com/eskelah"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}?v={{ env('APP_ASSETS_V') }}"></script>
    <script src="{{ asset('js/edit_rows.js') }}?v={{ env('APP_ASSETS_V') }}"></script>
    <script src="{{ asset('js/script.js') }}?v={{ env('APP_ASSETS_V') }}"></script>
    <script src="{{ asset('js/js_valid/main.js') }}?v={{ env('APP_ASSETS_V') }}"></script>

    <script>
        $(window).on('load', function () {
            $('#loading').hide();
        })
        ////////collapse
        $(document).ready(function(){
            $("i.far.fa-minus-square").click(function(){
                $(this).parent().next().collapse('toggle');
                var el_class = $(this).attr('class');
                if( el_class === 'far fa-minus-square' )
                    $(this).attr('class','far fa-plus-square');
                else if( el_class === 'far fa-plus-square' )
                    $(this).attr('class','far fa-minus-square');
            });
        });
        ////////breadcrumbs mobile
        $('button.navbar-toggler').click(function(){
            //$('.breadcrumbs').slideToggle();
            $('main.py-4').toggleClass('padd-top');
            $('li.nav-item.dropdown').toggleClass('padd-top');
            $('.dropdown-menu.dropdown-menu-right').toggleClass('show');
        });
    </script>

    @yield('script')

</body>
</html>
