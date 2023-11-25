@extends('layout.admin-layout')
@section('content')

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
                    <div class="col"><a href="/admin/add-user-add" class="btn btn-sm btn-success"><i class="mdi mdi-plus" style="width: 16px"></i> Add User</a></div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center no-sort" style="width: 30px">No</th>
                                <th>NIK</th>
                                <th>Nama User</th>
                                <th>username</th>
                                <th>password</th>
                                <th>Role</th>
                                <th style="width: 100px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table table-sm">
                            <tr>
                                <td class="text-center">1</td>
                                <td>12345678</td>
                                <td>Bambang Supriadi</td>
                                <td>bambangta2023</td>
                                <td>bambang#TA2023</td>
                                <td>User Admin</td>
                                <td>
                                    <a href="/admin/lim-2-detail" class="btn btn-primary py-2"><i class="mdi mdi-lead-pencil" style="font-size: 16px"></i> Edit</a>
                                    <a href="" class="btn btn-danger py-2"><i class="mdi mdi-delete" style="font-size: 16px"></i> Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>12345678</td>
                                <td>Bambang Supriadi</td>
                                <td>bambangta2023</td>
                                <td>bambang#TA2023</td>
                                <td>User Admin</td>
                                <td>
                                    <a href="/admin/lim-2-detail" class="btn btn-primary py-2"><i class="mdi mdi-lead-pencil" style="font-size: 16px"></i> Edit</a>
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