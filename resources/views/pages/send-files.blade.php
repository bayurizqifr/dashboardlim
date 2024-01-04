@inject('helper', 'App\Http\Controllers\helper')
@extends('layouts.layoutlim')
@section('content')
<style>
    .form-control, .form-select{
        border-radius: 3px;
    }
</style>
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
          <div class="card">
            <div class="card-body">
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>(Download Format Evaluasi Training)</h6>
                    <a href="/data-template/(LIM 2)Training_Evaluation_template_csv.csv" class="btn btn-outline-success p-2"><i class="typcn typcn-document" style="font-size: 14px"></i> Download file format</a>
                    <hr>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <h6>Nama Pelatihan</h6>
                            <select name="nama_pelatihan" id="select-pelatihan">
                                <option value=""></option>
                                @foreach ($data_nama_pelatihan as $row)
                                    <option value="{{ $row->nama_pelatihan }}" {{ old('nama_pelatihan') == $row->nama_pelatihan ? 'selected' : '' }}>{{ $row->nama_pelatihan }}</option>
                                @endforeach
                            </select>
                            @error('nama_pelatihan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mt-3">
                            <h6>Region</h6>
                            <select name="region" id="select-region">
                                <option value=""></option>
                                @foreach ($data_region as $row)
                                    <option value="{{ $row->region }}" {{ old('region') == $row->region ? 'selected' : '' }}>{{ $row->region }}</option>
                                @endforeach
                            </select>
                            @error('region')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mt-3">
                            <h6>Witel</h6>
                            <select name="witel" id="select-witel">
                                <option value=""></option>
                                @foreach ($data_witel as $row)
                                    <option value="{{ $row->witel }}" {{ old('witel') == $row->witel ? 'selected' : '' }}>{{ $row->witel }}</option>
                                @endforeach
                            </select>
                            @error('witel')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Tgl mulai pelaksanaan</h6>
                            <input name="tgl_mulai_pelaksanaan" type="date" class="form-control @error('tgl_mulai_pelaksanaan') is-invalid @enderror">
                            @error('tgl_mulai_pelaksanaan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Tgl selesai pelaksanaan</h6>
                            <input name="tgl_selesai_pelaksanaan" type="date" class="form-control @error('tgl_selesai_pelaksanaan') is-invalid @enderror">
                            @error('tgl_selesai_pelaksanaan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Bulan Pelaksanaan</h6>
                            <select name="bulan" class="form-select @error('bulan') is-invalid @enderror"  name="" id="">
                                <option value=""></option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            @error('bulan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Tahun Pelaksanaan</h6>
                            <input name="tahun" type="number" class="form-control @error('tahun') is-invalid @enderror" min="2000" max="2200">
                            @error('tahun')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                                    
                    <h6 class="mt-3">Upload .csv</h6>
                    <input type="file" name="csv" class="form-control w-75 @error('csv') is-invalid @enderror" style="background-color: #fff;">
                    @error('csv')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-warning px-5"><h6 class="m-0">Save</h6></button>
                    </div>
                </form>
            </div>
          </div>

          <br><br>
          <h5>Data Terupload</h5><br>

          <table class="table table-sm table-bordered" id="daftar_upload">
            <thead class="bg-info text-dark">
                <tr>
                    <td class="text-center"><b>No</b></td>
                    <td class="text-center"><b>Pengupload</b></td>
                    <td class="text-center"><b>Bulan pelaksanaan</b></td>
                    <td class="text-center"><b>Tahun pelaksanaan</b></td>
                    <td class="text-center"><b>Nama pelatihan</b></td>
                    <td class="text-center"><b>Tgl pelaksanaan</b></td>
                    <td class="text-center"><b>Tgl upload</b></td>
                    <td class="text-center"><b>Opsi</b></td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data_upload as $du)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ session('user_admin_username') }}</td>
                    <td class="text-center">{{ $helper->bulan($du->bulan_pelaksanaan) }}</td>
                    <td class="text-center">{{ $du->tahun_pelaksanaan }}</td>
                    <td class="text-center">{{ $du->nama_pelatihan }}</td>
                    <td class="text-center">{{ $du->tgl_mulai_pelaksanaan }} - {{ $du->tgl_selesai_pelaksanaan }}</td>
                    <td class="text-center">{{ $helper->tgl_indo($du->updated_at, 'tanggal dan jam') }}</td>
                    <td class="text-center">
                        <a href="/upload-detail?b={{ $du->bulan_pelaksanaan }}&t={{ $du->tahun_pelaksanaan }}" class="btn btn-success">Detail</a>
                        {{-- <button class="btn btn-success">Detail</button> --}}
                        {{-- <button class="btn btn-danger">Delete</button> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
      </div>
  </div>
</div>
<style>
    .br{
        margin-bottom: 20px;
    }
</style>

<script>
    // new DataTable('#example');
    $('#daftar_upload').DataTable( {
            "dom": '<"row"<"col"Blr><"col"f>><"row mt-3 mb-2"<"col"t>>ip',
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });

    new TomSelect("#select-pelatihan",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-region",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-witel",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#select-bulan",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>

@stop