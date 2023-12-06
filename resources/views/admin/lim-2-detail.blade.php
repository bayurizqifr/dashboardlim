@inject('helper', 'App\Http\Controllers\helper')
@extends('layout.admin-layout')
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Lim 2 | Training Evaluation | Detail</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/admin/lim-2?b={{ request()->get('b') }}&t={{ request()->get('t') }}" class="text-primary"><i class="mdi mdi-arrow-left" style="font-size: 16px"></i> Back</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="card border-dark rounded">
                            <div class="card-body">
                                <table>
                                    <tr><td><b>Nama Pelatihan</b></td><td class="px-3">:</td><td class="text-secondary">{{ $data_detail->nama_pelatihan }}</td></tr>
                                    <tr><td><b>Bulan</b></td><td class="px-3">:</td><td class="text-secondary">{{ $helper->bulan(request()->get('b')) }} {{ request()->get('t') }}</td></tr>
                                    <tr><td><b>Tgl Pelaksanaan</b></td><td class="px-3">:</td><td class="text-secondary">{{ $data_detail->tgl_mulai_pelaksanaan .' - '. $data_detail->tgl_selesai_pelaksanaan }}</td></tr>
                                    <tr><td><b>Regional</b></td><td class="px-3">:</td><td class="text-secondary">{{ $data_detail->regional }}</td></tr>
                                    <tr><td><b>Witel</b></td><td class="px-3">:</td><td class="text-secondary">{{ $data_detail->witel }}</td></tr>
                                    <tr><td><b>Instruktur</b></td><td class="px-3">:</td><td class="text-secondary">{{ $data_detail->nama_instruktur }}</td></tr>
                                    <tr><td><b>Nama Pengupload</b></td><td class="px-3">:</td><td class="text-secondary">{{ $helper->nama_user($data_detail->username_uploader) }}</td></tr>
                                </table>
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
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">Kehadiran</th>
                                <th class="text-center">Pre Test</th>
                                <th class="text-center">Post Test</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Peningkatan Belajar</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data_upload as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $row->nik }}</td>
                                <td>{{ $row->nama }}</td>
                                <td class="text-center">{!! $row->kehadiran == 'hadir' ? '<span class="badge badge-success">Hadir</span>' : $row->kehadiran !!}</td>
                                <td class="text-center">{{ $row->nilai_pre_test }}</td>
                                <td class="text-center">{{ $row->nilai_post_test }}</td>
                                <td class="text-center">{{ $helper->training_evaluation_keterangan($row->nilai_pre_test, $row->nilai_post_test) }}</td>
                                <td class="text-center">{{ ($row->nilai_post_test - $row->nilai_pre_test) / $row->nilai_pre_test * 100}}%</td>
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