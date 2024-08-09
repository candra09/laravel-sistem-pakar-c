@extends('layouts.app')

@section('title', 'Password Confirm')

@section('content')
    <div class="card">
        <div class="mb-4 text-sm text-secondary">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

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

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Confirm
                </button>
            </div>
        </form>
    </div>
@endsection
