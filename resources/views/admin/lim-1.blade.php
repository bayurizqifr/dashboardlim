@extends('layout.admin-layout')
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Lim 1 | Training Feedback</h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="mdi mdi-plus" style="font-size: 16px"></i> Add data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content text-left">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Add data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6>Download template <a href="">here</a></h6>
                                  <br>
                                  <form action="" method="post">
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
                                    <br>
                                    <h6>Tahun Pelaksanaan</h6>
                                    <input type="text" class="form-control form-control-sm border-dark">
                                    <br>
                                    <h6>Input CSV file</h6>
                                    <input type="file" class="form-control form-control-sm border-dark">
                                    <br>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
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
                    <table id="example" class="stripe">
                        <thead>
                            <tr>
                                <th class="text-center no-sort" style="width: 30px">No</th>
                                <th style="width: 50px">NIK</th>
                                <th style="width: 200px">Nama Lengkap</th>
                                <th style="width: 200px">Nama Perusahaan</th>
                                <th style="width: 200px">Nama Pelatihan</th>
                                <th style="width: 200px">Tgl Pelaksanaan</th>
                                <th style="width: 200px">Regional Penyelenggara</th>
                                <th style="width: 200px">Witel Penyelenggara</th>
                                <th style="width: 200px">Feedback Support (1-5)</th>
                                <th style="width: 200px">Feedback Facilitator (1-5)</th>
                                <th style="width: 200px">Feedback Facilities (1-5)</th>
                                <th style="width: 400px">Feedback Saran</th>
                                <th style="width: 200px">Feedback Manfaat (1-5)</th>
                                <th style="width: 200px">Feedback Antusias (1-10)</th>                                
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">12345678</td>
                                <td class="text-center">Bambang Supriadi</td>
                                <td class="text-center">PT TELKOM AKSES</td>
                                <td class="text-center">ToT Planning & Design FTTx</td>
                                <td class="text-center">10/26/2023 - 10/26/2023</td>
                                <td class="text-center">HO</td>
                                <td class="text-center">Witel Jakarta(HO)</td>
                                <td class="text-center">5</td>
                                <td class="text-center">5</td>
                                <td class="text-center">5</td>
                                <td class="text-center">Mantap</td>
                                <td class="text-center">5</td>
                                <td class="text-center">10</td>
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
            "scrollX": true,
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });
</script>
@endsection