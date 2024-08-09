<!DOCTYPE html>
<html>
<head>
    <!-- head content -->
</head>
<body>
    @if (Auth::user()->hasRole('Admin'))
        @include('layouts.admin')
    @elseif (Auth::user()->hasRole('Pengguna'))
        @include('layouts.user')
    @endif

    {{-- <div class="content">
        @yield('content')
    </div> --}}
</body>
</html>
