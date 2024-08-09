@extends('layouts.admin')

@section('title', 'Your Profile')

@section('head')
    <link href="{{ asset('dist/vendor/filepond/filepond.css') }}" rel="stylesheet" />

    {{-- <style>
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style> --}}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session()->has('failed'))
                    <div class="alert alert-danger">
                        {{ session()->get('failed') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <img src="{{ asset((auth()->user()->avatar) ? 'storage/'.auth()->user()->avatar : 'dist/img/boy.png') }}" alt="" style="border: 1px solid rgba(0,0,0,.25); border-radius: 10px; width: 200px">
                        </div>

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 d-flex justify-content-center">
                                {{-- <label for="avatar" class="form-label">Avatar</label> --}}
                                <img class=" w-25 h-25 img-profile rounded-circle" alt="Avatar" src="{{ asset('backend/img/undraw_profile.svg') }}">
                                {{-- <input type="file" name="avatar" id="avatar" class="form-control"> --}}
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" name="old_password" id="old_password" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/vendor/filepond/filepond.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputElement = document.querySelector('input[type="file"]');
            if (inputElement) {
                const pond = FilePond.create(inputElement);

                FilePond.setOptions({
                    server: {
                        url: '{{ route('admin.profile.upload') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });
            }
        });
    </script>
@endsection
