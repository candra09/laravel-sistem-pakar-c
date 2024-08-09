@extends('layouts.admin2')

@section('head')
    <link href="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Data Rules')


@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center px-2">
        <h4 class="mb-0 fw-bolder px-2">Data Rules</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 breadcrumb-custom bg-light">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Rules</li>
            </ol>
        </nav>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <div class="row">
			<div class="col-md-8">
					<form action="{{ route('admin.rules.update', $data_penyakit->id) }}" method="POST" id="update_rules">
						@csrf
				<div class="table-responsive">
						<table class="table align-items-center table-flush table-hover border" id="dataTableHover">
						<thead class="thead-light">
							<tr>
								<th style="width: 10%;">No.</th>
								<th style="width: 10%;">Kode.</th>
								<th style="width: 60%;">Gejala</th>
								<th style="width: 20%;">Nilai</th>
								<th style="width: 10%;"></th>
							</tr>
						</thead>
						<tbody>
							@php $rows = 1; @endphp

							@foreach($gejala_penyakit->get() as $row)
							<tr>
								<td>{{ $rows }}</td>
                                <td>{{ $row->kode }}</td>
								<td>{{ $row->nama }}</td>

								<td>
									<input type="number" step="0.2" class="form-control form-control-sm" value="{{ $row->pivot->value_cf }}" name="gejala-{{ $row->id }}">
								</td>
								<td>
									<div class="custom-control custom-switch">
						                <input type="checkbox" class="custom-control-input check" data-id="{{ $row->id }}" id="gejala-{{ $row->id }}" checked>
						                <label class="custom-control-label" for="gejala-{{ $row->id }}"></label>
						             </div>
								</td>
							</tr>
							@php $rows++; @endphp
							@endforeach

							@foreach($gejala as $row)
							@if(!in_array($row->id, $gejala_id))
							<tr>
								<td>{{ $rows }}</td>

								<td>{{ $row->nama }}</td>
								<td>
						            <input type="number" step="0.2" class="form-control form-control-sm" name="gejala-{{ $row->id }}" disabled>
								</td>
								<td>
									<div class="custom-control custom-switch">
						                <input type="checkbox" class="custom-control-input check" data-id="{{ $row->id }}" id="gejala-{{ $row->id }}">
						                <label class="custom-control-label" for="gejala-{{ $row->id }}"></label>
						              </div>
								</td>
							</tr>
							@php $rows++; @endphp
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
					</form>
			</div>

			<div class="col-md-4">
				<div class="list-group">
					@foreach($penyakit as $row)
					<a href="{{ route('admin.rules', $row->id) }}" class="list-group-item list-group-item-action {{ ($data_penyakit->nama == $row->nama) ? 'active' : '' }}">
					{{ $row->nama }}
					</a>
					@endforeach
				</div>
				<div class="mt-3">
					<button class="btn-primary btn save">Simpan</button>
					{{-- <a href="" class="btn-warning btn">Reset</a> --}}
				</div>
			</div>
		</div>

    </div>
</div>
@endsection

@push('scripts')
    <script>
        console.log('Script loading starts');
         $(document).ready(function() {
            console.log('JavaScript file loaded');

            $('.save').click(function() {
				$('#update_rules').submit()
			})

			$('.check').change(function() {
				const id = $(this).data('id')

				if(this.checked) {
					$(`input[name="gejala-${id}"]`).removeAttr('disabled')
				} else {
					$(`input[name="gejala-${id}"]`).attr('disabled', '')
					$(`input[name="gejala-${id}"]`).val('')
				}
			})

        });


    </script>
@endpush
