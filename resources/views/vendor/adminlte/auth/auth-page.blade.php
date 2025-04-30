@extends('adminlte::master')

@php
    $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home');

    if (config('adminlte.use_route_url', false)) {
        $dashboard_url = $dashboard_url ? route($dashboard_url) : '';
    } else {
        $dashboard_url = $dashboard_url ? url($dashboard_url) : '';
    }

    $bodyClasses = ($auth_type ?? 'login') . '-page';
    if (! empty(config('adminlte.layout_dark_mode', null))) {
        $bodyClasses .= ' dark-mode';
    }
@endphp

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ $bodyClasses }}@stop

@section('body')
    <div class="auth">
        <div class=" mainLoginContainer h-100">
            <!-- Logo/Image Section -->
            <div class="logo-wrapper left" >
                <div class="logo-container">
                    <a class="logo" href="{{ $dashboard_url }}">
                        <img src="{{ asset(config('adminlte.logo_img')) }}" class="auth-logo-image" alt="{{ config('adminlte.logo_img_alt') }}">
                        <span class="logo-text">Plant Your Voice <br> Grow Your Impact</span>
                    </a>
                </div>
            </div>

            <!-- Form Section -->
            <div class="right form-wrapper">
                <div class="form-container">
                    @hasSection('auth_header')
                        <h1 class="auth-header">@yield('auth_header')</h1>
                    @endif

                    @yield('auth_body')


                    @hasSection('auth_footer')
                        <div class="auth-footer">
                            @yield('auth_footer')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
