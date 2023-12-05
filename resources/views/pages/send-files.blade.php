@extends('layouts.layoutlim')
@section('content')

<div class="row">
  <div class="col-12">
      <h2 class="text-center"> Upload Evaluasi Training</h2>
  </div>
</div>

<div class="container mb-5 mt-3">
  <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <h6>(Download Format Evaluasi Training)</h6>
                    <a href="" class="btn btn-outline-success p-2"><i class="typcn typcn-document" style="font-size: 14px"></i> Download file format</a>
                    <br>
                    <br>
                    <h5>Bulan Pelaksanaan</h5>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"  name="" id="">
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
                    <br>
                    <h5>Tahun Pelaksanaan</h5>
                    <input type="text" class="form-control form-control-sm">
                    <br>
                    <h5>Upload .csv</h5>
                    <input type="file" name="csv" class="form-control form-control-sm">
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-md btn-warning hover-bg"><h6 class="m-0">Save</h6></button>
                    </div>
                </form>
            </div>
          </div>

          <br><br>
          <h5>Data Terupload</h5><br>

          <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>bulan_pelaksanaan</td>
                    <td>tahun_pelaksanaan</td>
                    <td>tgl_upload</td>
                    <td>...</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>...</td>
                    <td>...</td>
                    <td>00/00/0000</td>
                    <td>...</td>
                </tr>
            </tbody>
          </table>
      </div>
  </div>
</div>


@stop