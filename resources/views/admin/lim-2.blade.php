@extends('layout.admin-layout')
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Lim 2 | Training Evaluation</h4>
                    </div>
                    {{-- <div class="col-6 text-right">
                        <a href="" class="btn btn-sm btn-success"><i class="mdi mdi-file-multiple" style="font-size: 16px"></i> See all data</a>
                    </div> --}}
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="card border-dark rounded">
                            <div class="card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Bulan Pelaksanaan</h6>
                                            <select name="" id="" class="form-control form-control-sm border-dark">
                                                <option value="">Januari</option>
                                                <option value="">Februari</option>
                                                <option value="">Maret</option>
                                                <option value="">April</option>
                                                <option value="">Mei</option>
                                                <option value="">Juni</option>
                                                <option value="">Juli</option>
                                                <option value="">Agustus</option>
                                                <option value="">September</option>
                                                <option value="">Oktober</option>
                                                <option value="">November</option>
                                                <option value="">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <h6>Tahun Pelaksanaan</h6>
                                            <select name="" id="" class="form-control form-control-sm border-dark">
                                                <option value="">2023</option>
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
                                <th>Nama Pengupload</th>
                                <th>Nama Pelatihan</th>
                                <th>Tgl Pelaksanaan</th>
                                <th>Tgl Upload</th>
                                <th style="width: 100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            <tr>
                                <td class="text-center">1</td>
                                <td>Bambang Supriadi</td>
                                <td>Pelatihan Indihome Non Teknis ( Go Fiber Team Suport )</td>
                                <td>10/26/2023 - 10/26/2023</td>
                                <td>29 Oktober 2023</td>
                                <td>
                                    <a href="/admin/lim-2-detail" class="btn btn-success py-2"><i class="mdi mdi-magnify" style="font-size: 16px"></i> Lihat Detail</a>
                                    <a href="" class="btn btn-danger py-2"><i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Bambang Supriadi</td>
                                <td>Pelatihan Indihome Non Teknis ( Go Fiber Team Suport )</td>
                                <td>10/26/2023 - 10/26/2023</td>
                                <td>29 Oktober 2023</td>
                                <td>
                                    <a href="/admin/lim-2-detail" class="btn btn-success py-2"><i class="mdi mdi-magnify" style="font-size: 16px"></i> Lihat Detail</a>
                                    <a href="" class="btn btn-danger py-2"><i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus</a>
                                </td>
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