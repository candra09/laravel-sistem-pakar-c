@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card m-4 p-4">

        {{-- show alert if there are errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="card-title">Register</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- Name field -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" type="text" class="form-control" name="name" required>
            </div>

            <!-- email field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" required>
            </div>

            <!-- Password field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <!-- Password confirmation field -->
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">Register</button>
        </form>

        <div class="text-center mt-4">
            <hr>
            <a class="font-weight-bold small" href="{{ route('login') }}">Sudah memiliki akun?</a>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
