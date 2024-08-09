@extends('layouts.new')

@section('title', 'Info Page')

@push('head')
    <style>
        /* Add any additional styles if needed */
    </style>
@endpush

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Daftar Penyakit</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Penyakit</li>
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
            <div class="btn btn-success add" data-toggle="modal" data-target="#penyakit">
                <i class="fas fa-plus mr-1"></i> Tambahkan Penyakit
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama penyakit</th>
                        <th>Penyebab</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penyakit as $row)
                        <tr>
                            <td><b>{{ $row->kode }}</b></td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ \Str::limit($row->penyebab, 180) }}</td>
                            <td>
                                <div class="d-flex justify-between-space">
                                    <div>
                                        <button class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}"><i class="fas fa-edit"></i></button>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-info btn-sm ml-1 info"
                                        data-kode="{{ $row->kode }}" data-name="{{ $row->nama }}" data-penyebab="{{ $row->penyebab }}" data-solusi="{{ $row->solusi }}" data-pencegahan="{{ $row->pencegahan }}" >
                                            <i class="fas fa-eye"></i>
                                        </button>

                                    </div>
                                    <form action="{{ route('admin.penyakit.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-1 delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Penyakit -->
    <div class="modal fade" id="penyakit" tabindex="-1" role="dialog" aria-labelledby="penyakitLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="penyakitLabel">Tambahkan penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.penyakit.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode">Kode penyakit</label>
                                    <input type="text" class="form-control" name="kode" id="kode">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama">Nama penyakit</label>
                                    <input type="text" class="form-control" name="nama" id="nama">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="penyebab">Keterangan penyebab</label>
                                    <textarea name="penyebab" id="penyebab" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="solusi">Keterangan solusi</label>
                                    <textarea name="solusi" id="solusi" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pencegahan">Keterangan pencegahan</label>
                                    <textarea name="pencegahan" id="pencegahan" cols="30" rows="6" class="form-control"></textarea>
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

        <!-- Modal Edit Penyakit -->
<div class="modal fade" id="edit-penyakit" tabindex="-1" role="dialog" aria-labelledby="editPenyakitLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPenyakitLabel">Edit penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.penyakit.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit-id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit-kode">Kode penyakit</label>
                                <input type="text" class="form-control" name="kode" id="edit-kode">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="edit-nama">Nama penyakit</label>
                                <input type="text" class="form-control" name="nama" id="edit-nama">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="edit-penyebab">Keterangan penyebab</label>
                                <textarea name="penyebab" id="edit-penyebab" cols="30" rows="6" class="form-control"></textarea>
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




 <!-- Modal info Penyakit -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-6">
                            <b>Kode</b>
                        </div>
                        <div class="col-6" id="kode-modal"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <b>Nama</b>
                        </div>
                        <div class="col-6" id="name-modal"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <b>Penyebab</b>
                        </div>
                        <div class="col-6" id="penyebab-modal"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <b>Solusi</b>
                        </div>
                        <div class="col-6" id="solusi-modal"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <b>Pencegahan</b>
                        </div>
                        <div class="col-6" id="pencegahan-modal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('JavaScript file loaded');

        $(document).ready(function() {
        $('.add').click(function() {
            $('#penyakit').modal('show');
        });


        $('.edit').click(function() {
            const id = $(this).data('id');
            $.get(`{{ route('admin.penyakit.json') }}?id=${id}`, function(res) {
                console.log('Response data:', res); // Debug response data

                if (res.error) {
                    console.error('Error:', res.error);
                    return;
                }

                $('#edit-id').val(res.id);
                $('#edit-nama').val(res.nama);
                $('#edit-kode').val(res.kode);
                $('#edit-penyebab').val(res.penyebab);

                $('#edit-penyakit').modal('show');
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Request failed:', textStatus, errorThrown);
            });
        });

        $('.info').click(function(e) {
            e.preventDefault();

            const kode = $(this).data('kode');
            const name = $(this).data('name');
            const penyebab = $(this).data('penyebab');
            const solusi = $(this).data('solusi');
            const pencegahan = $(this).data('pencegahan');

            $('#kode-modal').text(kode);
            $('#name-modal').text(name);
            $('#penyebab-modal').text(penyebab);
            $('#solusi-modal').text(solusi);
            $('#pencegahan-modal').text(pencegahan);

            $('#infoModal').modal('show');
        });

        $('.delete').click(function(e) {
            e.preventDefault();
            Swal.fire({
              title: 'Hapus data penyakit?',
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
