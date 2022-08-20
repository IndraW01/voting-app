<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Voting APP</title>

    {{-- Style Wajib --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    {{-- Akhir Style Wajib --}}

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">

    @stack('costum-css')

</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        <x-partials.sidebar />

        <div id="main">
            {{-- Topbar --}}
            <x-partials.topbar />

            <div class="page-heading">
                {{-- Tittle Page --}}
                <h3>{{ $pageHeading }}</h3>
            </div>

            {{-- Page Content --}}
            {{ $slot }}

            {{-- Footer --}}

            <x-partials.footer />
        </div>
    </div>

    {{-- Script Wajib --}}
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- Akhir Script Wajib --}}

    {{-- SweetAlert Include Laravel --}}
    @include('sweetalert::alert')

    @stack('costum-js')

</body>

</html>
