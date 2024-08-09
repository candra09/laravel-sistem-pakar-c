<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="{{ url('/panel/user') }}">
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
    {{-- <li class="nav-item {{ request()->is('user/dashboard') || request()->is('user/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li> --}}


    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Pengguna'))
    <li class="nav-item {{ request()->routeIs('admin/diagnosa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.diagnosa.index') }}">
            <i class="fa fa-stethoscope"></i>
            <span>{{ __('Diagnosa') }}</span></a>

    </li>
    @endif

    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Pengguna'))
    <li class="nav-item {{ request()->routeIs('admin/riwayat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.riwayat.daftar') }}">
            <i class="fa fa-notes-medical"></i>
            <span>{{ __('Riwayat Diagnosa') }}</span></a>
    </li>
    @endif

    <hr class="sidebar-divider">
    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Pengguna'))
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-briefcase-medical"></i>
            <span>{{ __('Penyakit Lambung') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/penyakit-gerd') || request()->is('admin/penyakit-gerd/*') ? 'active' : '' }}" href="{{ route('admin.gerd') }}"> <i class="fa fa-briefcase-medical mr-2"></i> {{ __('GERD') }}</a>
                <a class="collapse-item {{ request()->is('admin/penyakit-dispepsia') || request()->is('admin/penyakit-dispepsia/*') ? 'active' : '' }}" href="{{ route('admin.dispepsia') }}"> <i class="fa fa-briefcase-medical mr-2"></i> {{ __('Dispepsia') }}</a>
                <a class="collapse-item {{ request()->is('admin/penyakit-tukak-lambung') || request()->is('admin/penyakit-tukak-lambung/*') ? 'active' : '' }}" href="{{ route('admin.tukak_lambung') }}"> <i class="fa fa-briefcase-medical mr-2"></i> {{ __('Tukak Lambung') }}</a>
                <a class="collapse-item {{ request()->is('admin/penyakit-maag') || request()->is('admin/penyakit-maag/*') ? 'active' : '' }}" href="{{ route('admin.maag') }}"> <i class="fa fa-briefcase-medical mr-2"></i> {{ __('Gastritis') }}</a>

            </div>
        </div>
    </li>
    @endif



</ul>
