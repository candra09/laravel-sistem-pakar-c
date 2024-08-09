<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/panel/home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('backend/img/logo-sp1.svg') }}" alt="Logo" style="width: 50px; height: auto;">
                </div>
                <div class="sidebar-brand-text mx-1">
                    SP <span>Penyakit Lambung</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/diagnosa') || request()->is('admin/diagnosa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.diagnosa.index') }}">
                    <i class="fa fa-stethoscope"></i>
                    <span>{{ __('Diagnosa') }}</span></a>
            </li>
            @endif

            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/riwayat') || request()->is('admin/riwayat') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.riwayat.daftar') }}">
                    <i class="fa fa-notes-medical"></i>
                    <span>{{ __('Riwayat Diagnosa') }}</span></a>
            </li>
            @endif

            <hr class="sidebar-divider my-0">
            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/member') || request()->is('admin/member') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.member') }}">
                    <i class="fa fa-users"></i>
                    <span>{{ __('Daftar User') }}</span></a>
            </li>
            @endif

            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/penyakit') || request()->is('admin/penyakit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.penyakit') }}">
                    <i class="fa fa-th-list"></i>
                    <span>{{ __('Daftar Penyakit') }}</span></a>
            </li>
            @endif

            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/gejala') || request()->is('admin/gejala') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.gejala') }}">
                    <i class="fa fa-th-list"></i>
                    <span>{{ __('Daftar Gejala') }}</span></a>
            </li>
            @endif

            @if (Auth::user()->roles->pluck('name')->contains('Admin'))
            <li class="nav-item {{ request()->is('admin/rules') || request()->is('admin/rules') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.rules',1) }}">
                    <i class="fa fa-briefcase-medical"></i>
                    <span>{{ __('Basis Rules') }}</span></a>
            </li>
            @endif




        </ul>
