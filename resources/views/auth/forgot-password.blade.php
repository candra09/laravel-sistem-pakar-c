@extends('layouts.app')

@section('title', 'Forgot Confirm')

@section('content')
    <div class="card">
        <div class="mb-4 text-sm text-secondary">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <!-- Session Status -->
        @if(session()->has('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">
                    Sent Email Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
