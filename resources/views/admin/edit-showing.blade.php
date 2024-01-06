@extends('layout.admin-layout')
@section('content')

@if (session('status-sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('status-sukses') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Show Setting</h4>
                    </div>
                </div>
                <div class="row">
                    <form action="/admin/edit-showing-edit" method="post" class="w-50">
                        @csrf
                        <h6>Bulan Pelaksanaan</h6>
                        <select name="bulan" class="form-control form-control-sm text-dark border-dark" >
                            <option value="1" {{ $show->bulan_pelaksanaan == 1 ? 'selected' : '' }} >Januari</option>
                            <option value="2" {{ $show->bulan_pelaksanaan == 2 ? 'selected' : '' }} >Februari</option>
                            <option value="3" {{ $show->bulan_pelaksanaan == 3 ? 'selected' : '' }} >Maret</option>
                            <option value="4" {{ $show->bulan_pelaksanaan == 4 ? 'selected' : '' }} >April</option>
                            <option value="5" {{ $show->bulan_pelaksanaan == 5 ? 'selected' : '' }} >Mei</option>
                            <option value="6" {{ $show->bulan_pelaksanaan == 6 ? 'selected' : '' }} >Juni</option>
                            <option value="7" {{ $show->bulan_pelaksanaan == 7 ? 'selected' : '' }} >Juli</option>
                            <option value="8" {{ $show->bulan_pelaksanaan == 8 ? 'selected' : '' }} >Agustus</option>
                            <option value="9" {{ $show->bulan_pelaksanaan == 9 ? 'selected' : '' }} >September</option>
                            <option value="10" {{ $show->bulan_pelaksanaan == 10 ? 'selected' : '' }} >Oktober</option>
                            <option value="11" {{ $show->bulan_pelaksanaan == 11 ? 'selected' : '' }} >November</option>
                            <option value="12" {{ $show->bulan_pelaksanaan == 12 ? 'selected' : '' }} >Desember</option>
                        </select>
                        <br>
                        <h6>Tahun Pelaksanaan</h6>
                        <input name="tahun" type="number" class="form-control form-control-sm text-dark border-dark" min="2000" max="2200" value="{{ $show->tahun_pelaksanaan }}">
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection