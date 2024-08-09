@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="card">

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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
@endsection
