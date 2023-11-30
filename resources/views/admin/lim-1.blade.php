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
                                  <form action="/admin/lim-1" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Bulan Pelaksanaan</h6>
                                    <select name="bulan" id="" class="form-control form-control-sm border-dark">
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
                                    <h6>Tahun Pelaksanaan</h6>
                                    <input name="tahun" type="number" class="form-control form-control-sm border-dark" min="2000" max="3000">
                                    <br>
                                    <h6>Input CSV file</h6>
                                    <input type="file" name="csv" class="form-control form-control-sm border-dark">
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
                                <form action="/admin/lim-1" method="get">
                                    {{-- @method('POST') --}}
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>Bulan Pelaksanaan</h6>
                                            <select name="bulan" id="" class="form-control form-control-sm border-dark">
                                                <option value="">Pilih bulan</option>
                                                <option value="1" {{ request()->get('bulan') == 1 ? 'selected' : ''}}>Januari</option>
                                                <option value="2" {{ request()->get('bulan') == 2 ? 'selected' : ''}}>Februari</option>
                                                <option value="3" {{ request()->get('bulan') == 3 ? 'selected' : ''}}>Maret</option>
                                                <option value="4" {{ request()->get('bulan') == 4 ? 'selected' : ''}}>April</option>
                                                <option value="5" {{ request()->get('bulan') == 5 ? 'selected' : ''}}>Mei</option>
                                                <option value="6" {{ request()->get('bulan') == 6 ? 'selected' : ''}}>Juni</option>
                                                <option value="7" {{ request()->get('bulan') == 7 ? 'selected' : ''}}>Juli</option>
                                                <option value="8" {{ request()->get('bulan') == 8 ? 'selected' : ''}}>Agustus</option>
                                                <option value="9" {{ request()->get('bulan') == 9 ? 'selected' : ''}}>September</option>
                                                <option value="10" {{ request()->get('bulan') == 10 ? 'selected' : ''}}>Oktober</option>
                                                <option value="11" {{ request()->get('bulan') == 11 ? 'selected' : ''}}>November</option>
                                                <option value="12" {{ request()->get('bulan') == 12 ? 'selected' : ''}}>Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <h6>Tahun Pelaksanaan</h6>
                                            <select name="tahun" id="" class="form-control form-control-sm border-dark">
                                                <option value="{{ request()->get('tahun') ? request()->get('tahun') : ''}}">{{ request()->get('tahun') ? request()->get('tahun') : 'Pilih tahun' }}</option>
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
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($training_feedback as $row)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">{{ $row->nik }}</td>
                                    <td class="text-center">{{ $row->nama_lengkap }}</td>
                                    <td class="text-center">{{ $row->nama_perusahaan }}</td>
                                    <td class="text-center">{{ $row->nama_pelatihan }}</td>
                                    <td class="text-center">{{ $row->tgl_mulai_training }} - {{ $row->tgl_akhir_training }}</td>
                                    <td class="text-center">{{ $row->regional_penyelenggara }}</td>
                                    <td class="text-center">{{ $row->witel_penyelenggara }}</td>
                                    <td class="text-center">{{ round(($row->feedback_support_1 + $row->feedback_support_2 + $row->feedback_support_3) / 3 , 2)}}</td>
                                    <td class="text-center">{{ round(($row->feedback_facilitator_1 + $row->feedback_facilitator_2 + $row->feedback_facilitator_3) / 3 , 2)}}</td>
                                    <td class="text-center">{{ round(($row->feedback_facilities_1 + $row->feedback_facilities_2 + $row->feedback_facilities_3) / 3 , 2)}}</td>
                                    <td class="text-center">{{ $row->feedback_saran }}</td>
                                    <td class="text-center">{{ $row->feedback_manfaat }}</td>
                                    <td class="text-center">{{ $row->feedback_antusias }}</td>
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
            "scrollX": true,
            "order": [],
            "columnDefs": [{ "orderable": false, "targets": 'no-sort' }]
    });
</script>
@endsection