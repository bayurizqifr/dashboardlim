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
          <div class="card">
            <div class="card-body">
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <h6>(Download Format Evaluasi Training)</h6>
                    <a href="" class="btn btn-outline-success p-2"><i class="typcn typcn-document" style="font-size: 14px"></i> Download file format</a>
                    <hr>
                    <div class="row">
                        <div class="col-4 mt-3">
                            <h6>Nama Pelatihan</h6>
                            <select name="nama_pelatihan" class="form-select form-select-sm @error('nama_pelatihan') is-invalid @enderror">
                                <option value="">Pilih pelatihan</option>
                                <option value="INSTALASI ODP PROVISIONING TYPE-2 MITRA">INSTALASI ODP PROVISIONING TYPE-2 MITRA</option>
                            </select>
                            @error('nama_pelatihan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mt-3">
                            <h6>Region</h6>
                            <select name="region" class="form-select form-select-sm @error('region') is-invalid @enderror">
                                <option value="">Pilih region</option>
                                <option value="Regional 1">Regional 1</option>
                            </select>
                            @error('region')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mt-3">
                            <h6>Witel</h6>
                            <select name="witel" class="form-select form-select-sm @error('witel') is-invalid @enderror">
                                <option value="">Pilih witel</option>
                                <option value="Tangerang">Tangerang</option>
                            </select>
                            @error('witel')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Tgl mulai pelaksanaan</h6>
                            <input name="tgl_mulai_pelaksanaan" type="date" class="form-control form-control-sm @error('tgl_mulai_pelaksanaan') is-invalid @enderror">
                            @error('tgl_mulai_pelaksanaan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Tgl selesai pelaksanaan</h6>
                            <input name="tgl_selesai_pelaksanaan" type="date" class="form-control form-control-sm @error('tgl_selesai_pelaksanaan') is-invalid @enderror">
                            @error('tgl_selesai_pelaksanaan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mt-3">
                            <h6>Bulan Pelaksanaan</h6>
                            <select name="bulan" class="form-select form-select-sm @error('bulan') is-invalid @enderror" aria-label=".form-select-sm example"  name="" id="">
                                <option value="">Pilih bulan</option>
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
                            <input name="tahun" type="number" class="form-control form-control-sm @error('tahun') is-invalid @enderror" min="2000" max="2200">
                            @error('tahun')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                                    
                    <h6 class="mt-3">Upload .csv</h6>
                    <input type="file" name="csv" class="form-control form-control-sm w-75 @error('csv') is-invalid @enderror">
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
          <h5>Data Terupload</h5><br>

          <table class="table table-sm table-bordered" id="daftar_upload">
            <thead class="bg-info text-dark">
                <tr>
                    <td class="text-center"><b>No</b></td>
                    <td class="text-center"><b>bulan_pelaksanaan</b></td>
                    <td class="text-center"><b>tahun_pelaksanaan</b></td>
                    <td class="text-center"><b>nama_pelatihan</b></td>
                    <td class="text-center"><b>tgl_pelaksanaan</b></td>
                    <td class="text-center"><b>tgl_upload</b></td>
                    <td class="text-center"><b>Opsi</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">...</td>
                    <td class="text-center">...</td>
                    <td class="text-center">...</td>
                    <td class="text-center">00/00/0000 - 00/00/0000</td>
                    <td class="text-center">00/00/0000</td>
                    <td class="text-center">
                        <button class="btn btn-success">Detail</button>
                        {{-- <button class="btn btn-danger">Delete</button> --}}
                    </td>
                </tr>
            </tbody>
          </table>
      </div>
  </div>
</div>

<script>
    // new DataTable('#example');
    $('#daftar_upload').DataTable( {
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });
</script>

@stop