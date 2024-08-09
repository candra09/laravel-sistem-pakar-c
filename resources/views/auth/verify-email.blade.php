@extends('layouts.app')

@section('title', 'Email Verification')

@section('content')
    <div class="card">

        <h2 class="card-title">Email Verification</h2>

        <div class="text-sm text-secondary">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                A new verification link has been sent to the email address you provided during registration.
            </div>
        @endif

        <div class="mt-4 text-center">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    Resend email verification
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Log out
                </button>
            </form>
        </div>
    </div>
@endsection
