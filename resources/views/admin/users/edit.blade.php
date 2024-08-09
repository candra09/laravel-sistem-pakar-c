@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    {{-- Show alert if there are errors --}}
    @include('partials.alert-error')

    @if(session()->has('success'))
        @include('partials.alert', ['type' => 'success', 'message' => session()->get('success')])
    @endif

    <div class="card m-4">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.member.update', $user->id) }}" method="POST">
                @csrf
                {{-- @method('POST') --}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control">
                            @error('confirm-password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select id="roles" name="roles[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ in_array($role, old('roles', $userRole)) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
