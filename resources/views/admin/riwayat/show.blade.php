@extends('layouts.app-diagnosa')

@section('title')
  Hasil Diagnosa
@endsection

@section('content')
  @if (session()->has('success'))
    <x-alert type="success" message="{{ session()->get('success') }}" />
  @endif

  <x-card title="Berikut Hasil Diagnosa Penyakit">
    <p class="mb-4">
      <i class="fas fa-user mr-1"></i> {{ $riwayat->nama }} <i class="fas fa-calendar ml-4 mr-1"></i> {{ $riwayat->created_at->format('d M Y, H:i:s') }}
    </p>

    <table class="table table-hover border">
      <thead class="thead-light">
        <tr>
          <th>Gejala yang Kamu Alami Saat Ini</th>
          <th>Tingkat Keyakinan</th>
          <th>CF User</th>
        </tr>
      </thead>
      <tbody>
        @foreach (unserialize($riwayat->gejala_terpilih) as $gejala)
          <tr>
            <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
            <td>{{ $gejala['keyakinan'] }}</td>
            <td>{{ $gejala['cf_user'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-5">
        <div class="alert alert-success">
          <h5 class="font-weight-bold">Kesimpulan</h5>
          <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan dengan Forward Chaining maka perhitungan Algoritma Certainty Factor memiliki tingkat keyakinan sebesar
              <b>{{ sprintf('%.4f', unserialize($riwayat->cf_max)[0]) }} ({{ sprintf('%.2f', unserialize($riwayat->cf_max)[0] * 100) }}%)</b>
              yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b>

              @if (unserialize($riwayat->cf_max)[0] == 1)
              <br><br>
              <span style="color: red; font-weight: bold; font-style: italic;"><b>Catatan: </b> Hasil diagnosa menunjukkan tingkat keyakinan 100%, yang berarti kondisi yang dimasukkan sangat berpengaruh dalam penyakit ini. Namun, tetap disarankan untuk melakukan konsultasi lebih lanjut dengan dokter untuk konfirmasi lebih lanjut.</span>
              @endif
          </p>

          <p> <b>Penyebab:</b>  {{ unserialize($riwayat->cf_max)[2] }}</p>
          <p> <b>Solusi:</b>  {{ unserialize($riwayat->cf_max)[3] }}</p>
          <p> <b>Pencegahan:</b>  {{ unserialize($riwayat->cf_max)[4] }}</p>
      </div>

      <p>
          <br><br>
          <span style="font-size: 20px; font-weight: bold;"> Berikut hasil perhitungan nilai keyakinan diagnosa</span>
      </p>

    @foreach (unserialize($riwayat->hasil_diagnosa) as $diagnosa)
      <div class="card card-body p-0 mt-5 border" style="box-shadow: none !important;">
        <div class="card-header bg-primary text-white p-2">
          <h6 class="font-weight-bold">Tabel Perhitungan Penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h6>
        </div>
        <table class="table table-hover">
          <thead class="thead-light">
            <tr>
              <th>Gejala</th>
              <th>CF User</th>
              <th>CF Expert</th>
              <th>CF (H, E)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($diagnosa['gejala'] as $gejala)
              <tr>
                <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                <td>{{ $gejala['cf_user'] }}</td>
                <td>{{ $gejala['cf_role'] }}</td>
                <td>{{ $gejala['hasil_perkalian'] }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot class="font-weight-bold">
            <tr>
              <td scope="row">Nilai CF</td>
              <td><span class="text-danger">{{ sprintf('%.4f', $diagnosa['hasil_cf']) }}</span></td>

            </tr>
          </tfoot>
        </table>
      </div>
    @endforeach


      <div class="mt-3 text-center">
        <a href="{{ asset("storage/downloads/$riwayat->file_pdf") }}" target="_blank" class="btn btn-primary mr-1"><i class="fas fa-print mr-1"></i> Print</a>
        <a href="{{ route('admin.diagnosa') }}" class="btn btn-warning mr-1"><i class="fas fa-redo mr-1"></i> Diagnosa Ulang</a>
      </div>
    </div>
  </x-card>
@endsection

{{-- @push('scripts')
    <script>
        // Data dari server
        const hasilDiagnosa = @json($hasil_diagnosa);
        const probabilitasTertinggi = @json($probabilitas_tertinggi);
        const probabilitasSetiapPenyakit = @json($probabilitas_setiap_penyakit);
        const gejalaTerpilih = @json($gejala_terpilih);

        // Menampilkan hasil di console
        console.log('Hasil Diagnosa:', hasilDiagnosa);
        console.log('Probabilitas Tertinggi:', probabilitasTertinggi);
        console.log('Probabilitas Setiap Penyakit:', probabilitasSetiapPenyakit);
        console.log('Gejala Terpilih:', gejalaTerpilih);
    </script>
@endpush --}}
