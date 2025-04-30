@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])
@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif
@section('auth_body')
    <div class="login-form">
        @if(session()->has('message'))
            <div class="alert alert-danger">{{ session()->get('message') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h1 class="h4">Login</h1>
        <form action="{{ $login_url }}" method="post">
            @csrf

            <div class="login-form-group">
                <input type="email" name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label>{{ __('adminlte::adminlte.email') }}</label>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="login-form-group">
                <input type="password" name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required autocomplete="current-password">
                <label>{{ __('adminlte::adminlte.password') }}</label>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>




            <button type="submit" class="btn loginButton btn-block">
                <i class="fas fa-sign-in-alt"></i>
                {{ __('Login') }}
            </button>


            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
                </div>

                @if($password_reset_url)
                    <a href="{{ $password_reset_url }}" class="forgot-password">
                        Forgot Password?
                    </a>
                @endif
            </div>
        </form>


    </div>
@stop
