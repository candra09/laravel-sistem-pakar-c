@extends('layouts.app-diagnosa')

@section('title', 'Diagnosa penyakit')



@section('content')

<div class="container-fluid">

    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Diagnosa penyakit</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Diagnosa penyakit</li>
            </ol>
        </nav>
    </div>

    <section class="row">

    {{-- chart section --}}
    <div class="col-md-12">
        @include('components.alert-error')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.diagnosa.index') }}" method="post">
                @csrf

                {{-- @role('Admin') --}}
                <label for=""><b><i class="fas fa-user mr-1"></i> Nama</b></label>
                <input type="text" class="form-control mb-3 w-50" name="nama">
                {{-- @endrole --}}

                <p>Pilih gejala yang sedang dirasakan.</p>

                <label for=""><b><i class="fas fa-th mr-1"></i> Gejala-gejala</b></label>
                @foreach($gejala as $key => $value)
                    @php
                    $mod = ($key + 1) % 2;
                    @endphp

                    @if($mod == 1)
                <div class="row">
                    @endif
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-between border mb-2 p-2">
                            <div>
                                <span class="ml-2">{{ $value->nama }}</span>
                            </div>
                            <div>
                                <select name="diagnosa[]" id="" class="form-control form-control-sm red-border">
                                    <option value="" selected>Tidak</option>
                                    <option value="{{ $value->id }}+0.4">Kurang yakin</option>
                                    <option value="{{ $value->id }}+0.6">Cukup yakin</option>
                                    <option value="{{ $value->id }}+0.8">Yakin</option>
                                    <option value="{{ $value->id }}+1">Sangat yakin</option>
                                </select>
                            </div>
                        </div>
                    </div>

                @if($mod == 0)
                </div>
                @endif

                @if($key + 1 == \App\Models\Gejala::count() && $mod != 0)
                </div>
                @endif

                @endforeach
                <div class="m-3">
                    <button type="submit" class="btn btn-primary ">Diagnosa sekarang</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</section>
@endsection

@section('script')
<script>
    $('button[type="submit"]').click(function() {
        $(this).attr('disabled')
    })

    $('select[name="diagnosa[]"]').on('change', function() {
        if(this.value == "") {
            $(this).attr('class', 'form-control form-control-sm red-border')
        } else {
            $(this).attr('class', 'form-control form-control-sm green-border')
        }
    })
</script>
@endsection
