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

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal menyimpan data. Isikan data dengan benar
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
                        <h4 class="card-title">Add Pelatihan</h4>
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-pelatihan">
                        <i class="mdi mdi-plus" style="width: 16px"></i> Add Pelatihan
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="add-pelatihan" tabindex="-1" role="dialog" aria-labelledby="add-pelatihanTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Pelatihan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/add-pelatihan" method="post">
                                    @csrf
                                    <h6>Nama pelatihan</h6>
                                    <input name="nama_pelatihan" type="text" class="form-control form-control-sm text-dark @if($errors->has('nama_pelatihan')) is-invalid @else border-dark @endif">
                                    @error('nama_pelatihan')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
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
                <hr>
                <div class="table-responsive">
                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center no-sort" style="width: 30px">No</th>
                                <th>Nama Pelatihan</th>
                                <th style="width: 100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pelatihan as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $row->nama_pelatihan }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger py-2" data-toggle="modal" data-target="#delete{{ $no }}">
                                        <i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{ $no }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $no }}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Pelatihan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p class="mb-4">Apakah anda yakin ingin menghapus data : <b>{{ $row->nama_pelatihan }}</b></p>
                                                <form action="/admin/add-pelatihan/{{ $row->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
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