@extends('layouts.app')
@section('content')

<style>
    section.our-clients {
        margin-top: 0;
    }

    /* div#video-container {
        max-width: 100%;
    } */
    #video-container {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: auto;
        padding-top: 25px;
    }

    #qr-video {
        width: 100%;
        height: auto;
    }

    #result {
        margin-top: 20px;
        text-align: center;
    }

    a#reader__dashboard_section_swaplink {
        display: none !important;
    }

    div#result {
        margin-bottom: 20px;
        font-size: 25px;
    }
    img[alt="Info icon"] {
        display: none;
    }
</style>

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

<div id="video-container">
    <div id="reader"></div>
</div>

<div id="result"> نتيجة المسح </div>

@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>
<script>
    var oldQrCode = "null";
    var oldResult = "نتيجة المسح";

    function onScanSuccess(qrCodeMessage) {
        if (qrCodeMessage) {

            // console.log(oldQrCode);
            // console.log("-------------");
            // console.log(qrCodeMessage);
            // console.log("-------------");
            // console.log(oldResult);

            if (oldQrCode != qrCodeMessage) {
                // console.log("------Send-------");
                sendDataToServer(qrCodeMessage);
                oldQrCode = qrCodeMessage;
            }
            else if(oldQrCode == qrCodeMessage){
                document.getElementById("result").innerHTML = '<span class="result"> '+oldResult+' </span>';
            }
            else {
                document.getElementById("result").innerHTML = '<span class="result"> نتيجة المسح </span>';
            }
        }
    }

    // Function to handle scan error
    function onScanError(errorMessage) {
        // oldQrCode = "";
        document.getElementById("result").innerHTML = '<span class="result"> نتيجة المسح </span>';
    }

    function sendDataToServer(data) {
        var endpoint = '{{ url("/qr_code_scanner/") }}/' + encodeURIComponent(data);

        fetch(endpoint, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(result => {
            document.getElementById("result").innerHTML = '<span class="result">' + result.message + '</span>';
            oldResult = result.message;
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
        });
    }

    var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
        fps: 30,
        qrbox: 250
    });

    html5QrCodeScanner.render(onScanSuccess, onScanError);

</script>


@endsection