<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    {{-- Style Wajib --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    {{-- Akhir Style Wajib --}}

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                {{ $slot }}
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="display: flex; justify-content: center;align-items: center">
                    <img src="{{ asset('assets/images/bg/Voting-rafiki.png') }}" height="650px" alt="">
                </div>
            </div>
        </div>

    </div>

    @stack('costum-js')
</body>

</html>
