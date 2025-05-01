@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

<nav class="main-header navbar navbar-expand-md navbar-white navbar-light">
    <div class="container">

        {{-- Left: brand + toggle --}}
        <a href="{{ url('/') }}" class="navbar-brand">
            @if(config('adminlte.logo_img_xl'))
                @include('adminlte::partials.common.brand-logo-xl')
            @else
                @include('adminlte::partials.common.brand-logo-xs')
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Centered text --}}
        <ul class="navbar-nav mx-auto d-none d-md-flex">
            <li class="nav-item navbar-center-item">
                <span class="nav-link font-weight-bold">
                    Welcome to Admin Panel
                </span>
            </li>
        </ul>

        {{-- Right: collapseable menu + user menu --}}
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                @yield('content_top_nav_right')
                @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')
                @if(Auth::check())
                    @if(config('adminlte.usermenu_enabled'))
                        @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
                    @else
                        @include('adminlte::partials.navbar.menu-item-logout-link')
                    @endif
                @endif
                @if($layoutHelper->isRightSidebarEnabled())
                    @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
                @endif
            </ul>
        </div>

    </div>
</nav>
@section('css')
<style>
    /* Ensure the .mx-auto list really centers itself */
.navbar .navbar-center-item {
  position: absolute;     /* pull it out of the standard flow */
  left: 50%;              /* push its left edge to 50% */
  transform: translateX(-50%); /* nudge it back by half its own width */
}

</style>
@endsection
