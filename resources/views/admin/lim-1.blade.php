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

@if (session('csv-gagal'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('csv-gagal') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal menyimpan data. Isikan data dengan benar
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<style>
    .ts-control{
        border: 1px solid #282f3a;
    }
</style>
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
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content text-left">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Add data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6>Download template <a href="/data-template/(LIM 1)Training_Feedback_template_csv.csv">here</a></h6>
                                  <hr>
                                  <form action="/admin/lim-1" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4 mt-3">
                                            <h6>Nama Pelatihan</h6>
                                            <select name="nama_pelatihan" id="select-pelatihan" >
                                                <option value="">Pilih pelatihan</option>
                                                @foreach ($data_nama_pelatihan as $row)
                                                    <option value="{{ $row->nama_pelatihan }}">{{ $row->nama_pelatihan }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_pelatihan')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-4 mt-3">
                                            <h6>Region</h6>
                                            <select name="region" id="select-region">
                                                <option value="">Pilih region</option>
                                                @foreach ($data_region as $row)
                                                    <option value="{{ $row->region }}">{{ $row->region }}</option>
                                                @endforeach
                                            </select>
                                            @error('region')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-4 mt-3">
                                            <h6>Witel</h6>
                                            <select name="witel" id="select-witel">
                                                <option value="">Pilih witel</option>
                                                @foreach ($data_witel as $row)
                                                    <option value="{{ $row->witel }}">{{ $row->witel }}</option>
                                                @endforeach
                                            </select>
                                            @error('witel')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-3 mt-3">
                                            <h6>Tgl mulai training</h6>
                                            <input name="tgl_mulai_training" type="date" class="form-control form-control-sm text-dark @if($errors->has('tgl_mulai_training')) is-invalid @else border-dark @endif">
                                            @error('tgl_mulai_training')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-3 mt-3">
                                            <h6>Tgl akhir training</h6>
                                            <input name="tgl_akhir_training" type="date" class="form-control form-control-sm text-dark @if($errors->has('tgl_akhir_training')) is-invalid @else border-dark @endif">
                                            @error('tgl_akhir_training')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-3 mt-3">
                                            <h6>Bulan Pelaksanaan</h6>
                                            <select name="bulan" class="form-control form-control-sm text-dark @if($errors->has('bulan')) is-invalid @else border-dark @endif" aria-label=".form-control-sm text-dark example" >
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
                                            <input name="tahun" type="number" class="form-control form-control-sm text-dark @if($errors->has('tahun')) is-invalid @else border-dark @endif" min="2000" max="2200">
                                            @error('tahun')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <h6>Input CSV file</h6>
                                    <input type="file" name="csv" class="form-control form-control-sm text-dark border-dark" required>
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
                    <div class="col-10">
                        <div class="card border-dark rounded">
                            <div class="card-body">
                                <form action="/admin/lim-1" method="get">
                                    {{-- @method('POST') --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <h6>Bulan Pelaksanaan</h6>
                                            <select name="b" id="" class="form-control form-control-sm border-dark" required>
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
                                        <div class="col-4">
                                            <h6>Tahun Pelaksanaan</h6>
                                            <select name="t" id="" class="form-control form-control-sm border-dark" required>
                                                <option value="{{ request()->get('t') ? request()->get('t') : ''}}">{{ request()->get('t') ? request()->get('t') : 'Pilih tahun' }}</option>
                                                @foreach ($data_tahun as $row)
                                                    <option value="{{ $row->tahun_pelaksanaan }}">{{ $row->tahun_pelaksanaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-sm btn-primary w-100 mt-4">Filter</button>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary w-100 mt-4" data-toggle="modal" data-target="#downloadFile">
                                                Download File
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Modal Download File-->
                                <div class="modal fade" id="downloadFile" tabindex="-1" role="dialog" aria-labelledby="downloadFileTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Download File</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/print-excel" method="post">
                                                @csrf
                                                <input type="hidden" name="table" value="training_feedback">
                                                <h6>Bulan Pelaksanaan</h6>
                                                <select name="bulan" id="" class="form-control form-control-sm border-dark">
                                                    <option value="">All</option>
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
                                                <br>
                                                <h6>Tahun Pelaksanaan</h6>
                                                <select name="tahun" id="" class="form-control form-control-sm border-dark" required>
                                                    <option value="{{ request()->get('t') ? request()->get('t') : ''}}">{{ request()->get('t') ? request()->get('t') : 'Pilih tahun' }}</option>
                                                    @foreach ($data_tahun as $row)
                                                        <option value="{{ $row->tahun_pelaksanaan }}">{{ $row->tahun_pelaksanaan }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <button type="submit" class="btn btn-primary py-2">Download</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

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
                                <th style="width: 400px">Feedback Rencana</th>
                                <th style="width: 400px">Feedback Saran</th>
                                <th style="width: 200px">Feedback Manfaat (1-5)</th>
                                <th style="width: 200px">Feedback Antusias (1-10)</th>                                
                                <th>Opsi</th>                                
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
                                    <td class="text-center">{{ $row->feedback_rencana }}</td>
                                    <td class="text-center">{{ $row->feedback_saran }}</td>
                                    <td class="text-center">{{ $row->feedback_manfaat }}</td>
                                    <td class="text-center">{{ $row->feedback_antusias }}</td>
                                    <td class="text-center">
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
                                                    <p class="mb-4 d-block">Apakah anda yakin ingin menghapus data <br> <b>{{ $row->nama_lengkap }}</b> <br> dengan NIK <b>{{ $row->nik }}</b></p>
                                                    <form action="/admin/lim-1/{{ $row->id }}" method="post" class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="hidden" name="b" value="{{ $row->bulan_pelaksanaan }}">
                                                        <input type="hidden" name="t" value="{{ $row->tahun_pelaksanaan }}">
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
            "scrollX": true,
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
</script>
@endsection