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
                    <div class="col-6 text-right">
                        <a href="/admin/add-user" class="text-primary"><i class="mdi mdi-arrow-left" style="font-size: 16px"></i> Back</a>
                    </div>
                </div>
                <div class="row">
                    <form action="" method="post" class="w-100">
                        <div class="col-6">
                            <h6>NIK</h6>
                            <input type="text" class="form-control form-control-sm border-dark">
                            <br>
                            <h6>Nama User</h6>
                            <input type="text" class="form-control form-control-sm border-dark">
                            <br>
                            <h6>Username</h6>
                            <input type="text" class="form-control form-control-sm border-dark">
                            <br>
                            <h6>Password</h6>
                            <input type="text" class="form-control form-control-sm border-dark">
                            <br>
                            <h6>Role</h6>
                            <select name="" id="" class="form-control form-control-sm border-dark">
                                <option value="">User Admin</option>
                                <option value="">Admin</option>
                                <option value="">Super Admin</option>
                            </select>
                            <br>
                            <br>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary w-100">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection