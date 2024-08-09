@extends('layouts.admin')

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
        {{-- <div class="card-header d-flex justify-content-end">
            <form action="{{ route('admin.logs.delete') }}" method="post">
				@csrf
				<button id="delete-logs-button" class="btn btn-danger">Hapus 7 hari terakhir</button>
			</form>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-bordered mb-3">
                <thead>
                    <th>Description</th>
                    <th>Properties</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td >{{ $log->description }}</td>
                        <td>
                            @if(!empty($log->properties))
                                @if(!empty($log->properties['attributes']))
                                    @foreach($log->properties["attributes"] as $key => $value)
                                    <ul>
                                        <li><b>{{ $key }}</b>: {{ is_array($value) ? json_encode($value) : $value }}</li>
                                    </ul>
                                    @endforeach
                                @else
                                @foreach($log->properties as $key => $value)
                                    <ul>
                                        @if(!empty($value))
                                        <li><b>{{ $key }}</b>: {{ is_array($value) ? json_encode($value) : $value }}</li>
                                        @endif
                                    </ul>
                                    @endforeach
                                @endif
                            @else
                            <td class="text-center">empty</td>
                            @endif
                        </td>
                        <td>{{ $log->created_at->format('d-M-Y H:i:s') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Nothing Logs</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        <div class="mt-3">
            {{ $logs->links('pagination::bootstrap-4') }}
        </div>
        </div>
    </div>

</div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#delete-logs-button').on('click', function() {
            if (confirm('Are you sure you want to delete logs older than one week?')) {
                $.ajax({
                    url: '{{ route('admin.logs.delete') }}',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert(response.success);
                        // Optional: Reload page or update UI to reflect changes
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error occurred while deleting logs.');
                    }
                });
            }
        });
    });
    </script>
@endpush

