@php
    $auth = Auth::user();
    $s1 = Request::segment(1);
    $s2 = Request::segment(2);
@endphp
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="index.html">PT. VIJAYANTI PERSADA</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <div class="ml-auto">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm mt-2">Logout</a>
    </div>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="text-center">
        <p class="text-white text-bold">{{ Str::upper($auth->username) }}</p>
    </div>
    <ul class="app-menu">
        <li>
            <a @if($s1 == "/" || $s1 == "dashboard") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "user") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('user') }}">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">User</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "perusahaan") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('perusahaan') }}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Perusahaan</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "checker") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('checker') }}">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Checker</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "assignment") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('assignment') }}">
                <i class="app-menu__icon fa fa-paper-plane"></i>
                <span class="app-menu__label">Assignment</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "dimensi") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('dimensi') }}">
                <i class="app-menu__icon fa fa-book"></i>
                <span class="app-menu__label">Dimensi</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "kriteria") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('kriteria') }}">
                <i class="app-menu__icon fa fa-tag"></i>
                <span class="app-menu__label">Kriteria</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "kriteria") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('survey') }}">
                <i class="app-menu__icon fa fa-file"></i>
                <span class="app-menu__label">Survey</span>
            </a>
        </li>
        <li>
            <a @if($s1 == "servqual") class="app-menu__item active" @else class="app-menu__item" @endif href="{{ url('servqual') }}">
                <i class="app-menu__icon fa fa-calculator"></i>
                <span class="app-menu__label">Perhitungan Servqual</span>
            </a>
        </li>
    </ul>
</aside>