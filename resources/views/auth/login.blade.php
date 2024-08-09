@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card m-4">

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
                <div class="card-body m-2">

                <h2 class="card-title">Login</h2>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email field -->
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" required>
                    </div>

                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                </form>
            </div>
                <div class="my-3 text-center">
                    <hr>
                    <a href="{{ route('register') }}" class="text-primary">Create new account?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
