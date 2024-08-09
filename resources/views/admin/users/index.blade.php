@extends('layouts.admin2')

@section('title', 'Daftar Member')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Daftar Member</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Member</li>
            </ol>
        </nav>
    </div>

<div class="card m-4">
    <div class="card-header">
        <div class="d-flex justify-content-end">

            <a href="{{ route('admin.member.create') }}" class="btn btn-success ml-2">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                                <span class="badge badge-{{ ($role == 'Admin') ? 'danger' : 'primary' }}">{{ $role }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-between-space">
                            <div>
                                <button type="button" class="btn btn-info btn-sm info"
                                data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-roles="{{ $user->getRoleNames() }}" data-created="{{ $user->created_at->format('d-M-Y H:i:s') }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>

                        <div>
                            <a href="{{ route('admin.member.edit', $user->id) }}" class="btn btn-primary btn-sm ml-1"><i class="fas fa-edit"></i></a>
                        </div>
                        {{-- <form onclick="return confirm('Ingin menghapus user? ')"  class="d-inline" action="{{ route('admin.member.delete', $user->id) }}" style="display: inline-block;" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                        </form> --}}

                        <form action="{{ route('admin.member.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-1 delete "><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No Member</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal -->
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
                        <b>Nama</b>
                    </div>
                    <div class="col-6" id="name-modal"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <b>Email</b>
                    </div>
                    <div class="col-6" id="email-modal"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <b>Roles</b>
                    </div>
                    <div class="col-6" id="roles-modal"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <b>Created</b>
                    </div>
                    <div class="col-6" id="created-modal"></div>
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

        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM fully loaded and parsed');

            document.querySelectorAll('.info').forEach(function(button) {
                console.log('Event listener attached to', button);
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    console.log('Name:', this.getAttribute('data-name'));
                    console.log('Email:', this.getAttribute('data-email'));
                    console.log('Roles:', this.getAttribute('data-roles'));
                    console.log('Created:', this.getAttribute('data-created'));

                    document.getElementById('name-modal').textContent = this.getAttribute('data-name');
                    document.getElementById('email-modal').textContent = this.getAttribute('data-email');
                    document.getElementById('roles-modal').textContent = this.getAttribute('data-roles');
                    document.getElementById('created-modal').textContent = this.getAttribute('data-created');

                    // Show modal (assuming you are using Bootstrap or similar)
                    $('#infoModal').modal('show');
                });
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
