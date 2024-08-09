@extends('layouts.admin')

@section('title', 'New User')

@section('content')
<div class="container-fluid">
    {{-- show alert if there are errors --}}
    @include('partials.alert-error')

    @if(session()->has('success'))
        @include('partials.alert', ['type' => 'success', 'message' => session()->get('success')])
    @endif

    <div class="card">

        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Create User</h4>
                <a href="{{ route('admin.member') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.member.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm-password">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles">{{ __('Roles') }}</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
