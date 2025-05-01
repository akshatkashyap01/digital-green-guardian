@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }} shadow-lg">

    {{-- ◀ LEFT NAVIGATION ▶ --}}
    <ul class="navbar-nav">
        @if(config('adminlte.sidebar_toggler_icon'))
            @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')
        @endif
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')
        @yield('content_top_nav_left')
    </ul>

    {{-- ◀ CENTERED TEXT ▶ --}}
    <ul class="navbar-nav mx-auto d-none d-md-flex">
        <li class="nav-item navbar-center-item">
            <span class="nav-link font-weight-bold nav-text-main">
                Plant Your Voice | Grow Your Impact
            </span>
        </li>
    </ul>

    {{-- ◀ RIGHT NAVIGATION ▶ --}}
    <ul class="ml-auto navbar-nav">
        @yield('content_top_nav_right')
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')
        @if(Auth::user())
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

</nav>
