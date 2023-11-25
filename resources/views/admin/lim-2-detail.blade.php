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
                        <a href="/admin/lim-2" class="text-primary"><i class="mdi mdi-arrow-left" style="font-size: 16px"></i> Back</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="card border-dark rounded">
                            <div class="card-body">
                                <table>
                                    <tr><td><b>Nama Pelatihan</b></td><td class="px-3">:</td><td class="text-secondary">Pelatihan Indihome Non Teknis ( Go Fiber Team Suport )</td></tr>
                                    <tr><td><b>Bulan</b></td><td class="px-3">:</td><td class="text-secondary">Oktober 2023</td></tr>
                                    <tr><td><b>Tgl Pelaksanaan</b></td><td class="px-3">:</td><td class="text-secondary">10/26/2023 - 10/26/2023</td></tr>
                                    <tr><td><b>Regional</b></td><td class="px-3">:</td><td class="text-secondary">Regional 4</td></tr>
                                    <tr><td><b>Witel</b></td><td class="px-3">:</td><td class="text-secondary">Semarang</td></tr>
                                    <tr><td><b>Instruktur</b></td><td class="px-3">:</td><td class="text-secondary">Ali Hamzah</td></tr>
                                    <tr><td><b>Nama Pengupload</b></td><td class="px-3">:</td><td class="text-secondary">Bambang Supriadi</td></tr>
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
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">12345678</td>
                                <td>Shinta Mayangkasih</td>
                                <td class="text-center"><span class="badge badge-success">Hadir</span></td>
                                <td class="text-center">50</td>
                                <td class="text-center">90</td>
                                <td class="text-center">High Profesional Learner</td>
                                <td class="text-center">80%</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">12345678</td>
                                <td>Shinta Mayangkasih</td>
                                <td class="text-center"><span class="badge badge-success">Hadir</span></td>
                                <td class="text-center">50</td>
                                <td class="text-center">90</td>
                                <td class="text-center">High Profesional Learner</td>
                                <td class="text-center">80%</td>
                            </tr>
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