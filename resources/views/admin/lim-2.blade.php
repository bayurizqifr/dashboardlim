@inject('helper', 'App\Http\Controllers\helper')
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
                        <h4 class="card-title">Lim 2 | Training Evaluation</h4>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="card border-dark rounded">
                            <div class="card-body">
                                <form action="/admin/lim-2" method="get">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Bulan Pelaksanaan</h6>
                                            <select name="b" id="" class="form-control form-control-sm border-dark">
                                                <option value="">Pilih bulan</option>
                                                <option value="1" {{ request()->get('b') == 1 ? 'selected' : ''}}>Januari</option>
                                                <option value="2" {{ request()->get('b') == 2 ? 'selected' : ''}}>Februari</option>
                                                <option value="3" {{ request()->get('b') == 3 ? 'selected' : ''}}>Maret</option>
                                                <option value="4" {{ request()->get('b') == 4 ? 'selected' : ''}}>April</option>
                                                <option value="5" {{ request()->get('b') == 5 ? 'selected' : ''}}>Mei</option>
                                                <option value="6" {{ request()->get('b') == 6 ? 'selected' : ''}}>Juni</option>
                                                <option value="7" {{ request()->get('b') == 7 ? 'selected' : ''}}>Juli</option>
                                                <option value="8" {{ request()->get('b') == 8 ? 'selected' : ''}}>Agustus</option>
                                                <option value="9" {{ request()->get('b') == 9 ? 'selected' : ''}}>September</option>
                                                <option value="10" {{ request()->get('b') == 10 ? 'selected' : ''}}>Oktober</option>
                                                <option value="11" {{ request()->get('b') == 11 ? 'selected' : ''}}>November</option>
                                                <option value="12" {{ request()->get('b') == 12 ? 'selected' : ''}}>Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <h6>Tahun Pelaksanaan</h6>
                                            <select name="t" id="" class="form-control form-control-sm border-dark">
                                                <option value="{{ request()->get('t') ? request()->get('t') : ''}}">{{ request()->get('t') ? request()->get('t') : 'Pilih tahun' }}</option>
                                                @foreach ($data_tahun as $row)
                                                    <option value="{{ $row->tahun_pelaksanaan }}">{{ $row->tahun_pelaksanaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-sm btn-primary mt-4">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center no-sort" style="width: 30px">No</th>
                                <th class="text-center">Nama Pengupload</th>
                                <th class="text-center">Nama Pelatihan</th>
                                <th class="text-center">Tgl Pelaksanaan</th>
                                <th class="text-center">Tgl Upload</th>
                                <th class="text-center" style="width: 100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($training_evaluations as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $helper->nama_user($row->username_uploader) }}</td>
                                <td>{{ $row->nama_pelatihan }}</td>
                                <td>{{ $row->tgl_mulai_pelaksanaan }} - {{ $row->tgl_selesai_pelaksanaan }}</td>
                                <td>{{ $helper->tgl_indo($row->updated_at, 'tanggal dan jam') }}</td>
                                <td>
                                    {{-- Lihat Detail --}}
                                    <form action="/admin/lim-2-detail" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="b" value="{{ $row->bulan_pelaksanaan }}">
                                        <input type="hidden" name="t" value="{{ $row->tahun_pelaksanaan }}">
                                        <input type="hidden" name="username" value="{{ $row->username_uploader }}">
                                        <input type="hidden" name="nama_pelatihan" value="{{ $row->nama_pelatihan }}">
                                        <button class="btn btn-success py-2"><i class="mdi mdi-magnify" style="font-size: 16px"></i> Lihat Detail</button>
                                    </form>

                                    {{-- Hapus --}}
                                    <button type="button" class="btn btn-danger py-2" data-toggle="modal" data-target="#delete{{ $no }}">
                                        <i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{ $no }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $no }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p class="mb-4 d-block">Apakah anda yakin ingin menghapus data yang di upload <br> oleh <b>{{ $helper->nama_user($row->username_uploader) }}</b> pada <b>{{ $helper->tgl_indo($row->updated_at, 'tanggal dan jam') }}</b></p>
                                                <form action="/admin/lim-2-delete" method="post" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="b" value="{{ $row->bulan_pelaksanaan }}">
                                                    <input type="hidden" name="t" value="{{ $row->tahun_pelaksanaan }}">
                                                    <input type="hidden" name="username" value="{{ $row->username_uploader }}">
                                                    <input type="hidden" name="nama_pelatihan" value="{{ $row->nama_pelatihan }}">
                                                    <button type="submit" class="btn btn-danger py-2"><i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // new DataTable('#example');
    $('#example').DataTable( {
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });
</script>
@endsection