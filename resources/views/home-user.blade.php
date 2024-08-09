@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row mt-5 align-items-center">
        <div class="col-md-6 d-flex flex-column align-items-center text-center">
            <h1 class="display-4">Sistem Pakar Penyakit Lambung</h1>
            <p class="lead">Gunakan sistem ini untuk melakukan diagnosa penyakit Lambung</p>
            <div class="mt-5 d-flex justify-content-center">
                <a class="btn btn-primary btn-lg btn-custom" href="{{ route('admin.diagnosa.index') }}" role="button">Mulai Diagnosa</a>
                <a class="btn btn-info btn-lg ml-2" href="{{ route('login') }}" role="button">Login</a>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <img src="{{ asset('backend/img/bg1.png') }}" alt="Healthcare" class="img-fluid">
        </div>
    </div>
</div>
@endsection
