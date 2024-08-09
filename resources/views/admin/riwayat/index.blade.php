@extends('layouts.app-diagnosa')

@section('title', 'Riwayat penyakit')



@section('content')
<div class="container-fluid">

    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Riwayat penyakit</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat penyakit</li>
            </ol>
        </nav>
    </div>

    <!-- Menampilkan alert -->
    @include('partials.alert-error')

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover border">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Penyakit terdiagnosa</th>
                <th>Tanggal</th>
                <th></th>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse($riwayat as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ unserialize($row->cf_max)[1] }} <b>(<span class="text-danger">{{ number_format(unserialize($row->cf_max)[0] * 100, 2) }}%</span>)</b></td>
                    <td>{{ $row->created_at->format('d M Y, H:i:s') }}</td>
                    <td>
                        <a href="{{ asset("storage/downloads/$row->file_pdf") }}" target="_blank" class="btn btn-primary btn-sm mr-1"><i class="fas fa-print mr-1"></i></a>
                        <a href="{{ route('admin.riwayat', $row->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye mr-1"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $riwayat->links('pagination::bootstrap-4') }}
        </div>
        </div>
    </div>


</div>
</section>
@endsection
