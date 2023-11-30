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
                        <h4 class="card-title">Add User</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><a href="/admin/add-user/create" class="btn btn-sm btn-success"><i class="mdi mdi-plus" style="width: 16px"></i> Add User</a></div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center no-sort" style="width: 30px">No</th>
                                <th>NIK</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th style="width: 100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->password }}</td>
                                <td>{{ $row->role }}</td>
                                <td>
                                    <a href="/admin/add-user/{{ $row->nik }}/edit" class="btn btn-primary py-2"><i class="mdi mdi-lead-pencil" style="font-size: 16px"></i> Edit</a>
                                    @if ($row->role !== 'super_admin')
                                        <button type="button" class="btn btn-danger py-2" data-toggle="modal" data-target="#delete{{ $no }}">
                                            <i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{ $no }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $no }}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <p class="mb-4">Apakah anda yakin ingin menghapus data dengan username : <b>{{ $row->username }}</b></p>
                                                    <form action="/admin/add-user/{{ $row->nik }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger py-2"><i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endif

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