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
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="/admin/add-user" class="text-primary"><i class="mdi mdi-arrow-left" style="font-size: 16px"></i> Back</a>
                    </div>
                </div>
                <div class="row">
                    <form action="/admin/add-user/{{ $user->nik }}" method="post" class="w-100">
                        @method('PUT')
                        @csrf
                        <div class="col-6">
                            <h6>NIK</h6>
                            <input type="text" class="form-control form-control-sm" value="{{ $user->nik }}" disabled>
                            <br>
                            <h6>Nama User</h6>
                            <input type="text" name="nama_user" class="form-control form-control-sm @if($errors->has('nama_user')) is-invalid @else border-dark @endif" value="{{ $user->name }}">
                            @error('nama_user')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Email</h6>
                            <input type="text" class="form-control form-control-sm" value="{{ $user->email }}" disabled>
                            <br>
                            <h6>Username</h6>
                            <input type="text" class="form-control form-control-sm" value="{{ $user->username }}" disabled>
                            <br>
                            <h6>Password</h6>
                            <input type="text" name="password" class="form-control form-control-sm @if($errors->has('password')) is-invalid @else border-dark @endif" value="{{ $user->password }}">
                            @error('password')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Role</h6>
                            @if ($user->role == 'super_admin')
                                <input type="text" class="form-control form-control-sm" value="{{ $user->role }}" disabled>
                            @else
                                <select name="role" class="form-control form-control-sm @if($errors->has('role')) is-invalid border-danger @else border-dark @endif">
                                    <option value="">Pilih role</option>
                                    <option value="user_admin" {{ $user->role == 'user_admin' ? 'selected' : '' }}>User Admin</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <p class="text-danger mb-0">{{ $message }}</p>
                                @enderror
                            @endif
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