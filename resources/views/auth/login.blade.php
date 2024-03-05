<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}?v={{ env('APP_ASSETS_V') }}">
    <title> مركاز البلـد الأمـين </title>    
    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" />
    
</head>
<body>

    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img src="{{ asset('assets/img/logo.svg') }}" alt="">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
            <div class="content">
            <div class="input-field">
                <input type="email" placeholder="Email" autocomplete="nope" name="email">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password" autocomplete="new-password">
            <div class="action">
            <button>Sign in</button>
            </div>
        </form>
    </div>

</body>
</html>