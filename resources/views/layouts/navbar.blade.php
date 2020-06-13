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
        @if ($auth->role_id == 1)
            <li @if($s1 == "kriteria" || $s1 == "dimensi") class="treeview is-expanded" @else class="treeview" @endif>
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-folder"></i>
                    <span class="app-menu__label">Data Master</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a @if($s1 == "kriteria") class="treeview-item active" @else class="treeview-item" @endif href="{{ url('kriteria') }}">
                            <i class="icon fa fa-circle-o"></i> Input Kriteria
                        </a>
                    </li>
                    <li>
                        <a @if($s1 == "dimensi") class="treeview-item active" @else class="treeview-item" @endif href="{{ url('dimensi') }}">
                            <i class="icon fa fa-circle-o"></i> Input Dimensi
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li @if($s1 == "kuisioner") class="treeview is-expanded" @else class="treeview" @endif>
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-folder"></i>
                <span class="app-menu__label">Kuisioner</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a @if($s1 == "kuisioner") class="treeview-item active" @else class="treeview-item" @endif href="{{ url('kuisioner') }}">
                        <i class="icon fa fa-circle-o"></i> Data Kuisioner
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="#">
                        <i class="icon fa fa-circle-o"></i> Isi Kuisioner
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>