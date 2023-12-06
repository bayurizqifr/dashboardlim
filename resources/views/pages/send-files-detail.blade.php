@inject('helper', 'App\Http\Controllers\helper')
@extends('layouts.layoutlim')
@section('content')

<div class="row">
  <div class="col-12">
      <h2 class="text-center"> Upload Evaluasi Training</h2>
  </div>
</div>

<div class="container mb-5 mt-3">

    @if (session('status-sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('status-sukses') !!}
        </div>
    @endif

  <div class="row">
      <div class="col">

          <br>
          {{-- <h5>Data Terupload ({{ $helper->bulan(request()->get('b')) .' '. request()->get('t') }})</h5><br> --}}
          <div class="card mb-4 w-50 border-dark">
            <div class="card-body">
                <table>
                    <tr><td class="text-dark"><b>Nama Pelatihan </b></td><td>: {{ $data_detail->nama_pelatihan }}</td></tr>
                    <tr><td class="text-dark"><b>Tgl Pelatihan </b></td><td>: {{ $data_detail->tgl_mulai_pelaksanaan .' - '. $data_detail->tgl_selesai_pelaksanaan .' ('. $helper->bulan(request()->get('b')) .' '. request()->get('t') .')'}}</td></tr>
                    <tr><td class="text-dark"><b>Regional </b></td><td>: {{ $data_detail->regional }}</td></tr>
                    <tr><td class="text-dark"><b>Witel </b></td><td>: {{ $data_detail->witel }}</td></tr>
                </table>
            </div>
          </div>

          <table class="table table-sm table-bordered" id="daftar_upload">
            <thead class="bg-info text-dark">
                <tr>
                    <td class="text-center"><b>No</b></td>
                    <td class="text-center"><b>NIK</b></td>
                    <td class="text-center"><b>Nama</b></td>
                    <td class="text-center"><b>Kehadiran</b></td>
                    <td class="text-center"><b>Nama Instruktur</b></td>
                    <td class="text-center"><b>Pre Test</b></td>
                    <td class="text-center"><b>Post Test</b></td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data_upload as $du)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $du->nik }}</td>
                    <td class="text-center">{{ $du->nama }}</td>
                    <td class="text-center">{{ $du->kehadiran }}</td>
                    <td class="text-center">{{ $du->nama_instruktur }}</td>
                    <td class="text-center">{{ $du->nilai_pre_test }}</td>
                    <td class="text-center">{{ $du->nilai_post_test }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
  </div>
</div>

<script>
    // new DataTable('#example');
    $('#daftar_upload').DataTable( {
            "dom": '<"row"<"col"Blr><"col"f>><"row mt-3 mb-2"<"col"t>>ip',
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });
</script>

@stop