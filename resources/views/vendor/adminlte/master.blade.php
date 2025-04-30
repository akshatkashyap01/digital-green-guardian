<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    <!-- Base CSS (before plugins) -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Google Fonts (optional) -->
    @if(config('adminlte.google_fonts.allowed', true))
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    @endif

    <!-- Livewire Styles -->
    @if(config('adminlte.livewire'))
        @livewireStyles
    @endif

    <!-- Custom CSS -->
    @vite(['resources/sass/app.scss'])

    <!-- Extra Plugin CSS -->
    @include('adminlte::plugins', ['type' => 'css'])

    <!-- Page Specific CSS -->
    @yield('adminlte_css')
</head>

<body class="@yield('classes_body')" @yield('body_data') style="visibility: hidden;">
    <!-- Loader (optional) -->
    @include('components.loader')

    <!-- Main Content -->
    @yield('body')

    <!-- jQuery + Bootstrap -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Livewire Scripts -->
    @if(config('adminlte.livewire'))
        @livewireScripts
    @endif

    <!-- App JS -->
    @vite(['resources/js/app.js'])

    <!-- Extra Plugin JS -->
    @include('adminlte::plugins', ['type' => 'js'])

    <!-- Page Specific JS -->
    @yield('adminlte_js')

    <!-- Prevent FOUC -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.body.style.visibility = 'visible';
        });
    </script>
</body>
</html>
