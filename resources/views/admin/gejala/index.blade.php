@extends('layouts.admin2')

@section('title', 'Daftar Gejala')


@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Daftar Gejala</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Gejala</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <div class="btn btn-success add" data-toggle="modal" data-target="#gejala">
                <i class="fas fa-plus mr-1"></i> Tambahkan Gejala
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover border">
                <thead>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse($gejala as $row)
                    <tr>
                        <td><b>{{ $row->kode }}</b></td>
                        <td>{{ $row->nama }}</td>
                        <td>
                            <div class="d-flex justify-between-space">
                                <div>
                                    <button class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}"><i class="fas fa-edit"></i></button>
                                </div>
                                <form action="{{ route('admin.gejala.destroy', $row->id) }}" method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-sm ml-1 delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-2">
                {{ $gejala->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>




     <!-- Modal Tambah gejala -->
     <div class="modal fade" id="gejala" tabindex="-1" role="dialog" aria-labelledby="gejalaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gejalaLabel">Tambahkan gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gejala.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Kode gejala</label>
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama">Nama gejala</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit gejala -->
    <div class="modal fade" id="edit-gejala" tabindex="-1" role="dialog" aria-labelledby="editgejalaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editgejalaLabel">Edit gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.gejala.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="edit-id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode">Kode gejala</label>
                                    <input type="text" class="form-control" name="kode">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama">Nama gejala</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        console.log('Script loading starts');
         $(document).ready(function() {
            console.log('JavaScript file loaded');

            $('.add').click(function() {
            $('#gejala').modal('show');
        });
        $('.edit').click(function() {
            const id = $(this).data('id');

            $.get(`{{ route('admin.gejala.json') }}?id=${id}`, function(res) {
                $('#edit-gejala input[name="id"]').val(res.id);
                $('#edit-gejala input[name="nama"]').val(res.nama);
                $('#edit-gejala input[name="kode"]').val(res.kode);

                $('#edit-gejala').modal('show');
            });
        });


            $('.delete').click(function(e) {
            e.preventDefault();
            console.log('Delete button clicked');
            Swal.fire({
              title: 'Hapus data Gejala?',
              text: "Kamu tidak akan bisa mengembalikannya kembali!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              cancelButtonText: 'Batal',
              confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
              if (result.isConfirmed) {
                $(this).closest('form').submit();
              }
            });
        });
        });


    </script>
@endpush
