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
                    <form action="/admin/add-user" method="post" class="w-100">
                        @csrf
                        <div class="col-6">
                            <h6>NIK</h6>
                            <input type="text" name="nik" class="form-control form-control-sm @if($errors->has('nik')) is-invalid @else border-dark @endif" value="{{ old('nik') }}">
                            @error('nik')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Nama User</h6>
                            <input type="text" name="nama_user" class="form-control form-control-sm @if($errors->has('nama_user')) is-invalid @else border-dark @endif" value="{{ old('nama_user') }}">
                            @error('nama_user')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Email</h6>
                            <input type="text" name="email" class="form-control form-control-sm @if($errors->has('email')) is-invalid @else border-dark @endif" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Username</h6>
                            <input type="text" name="username" class="form-control form-control-sm @if($errors->has('username')) is-invalid @else border-dark @endif" value="{{ old('username') }}">
                            @error('username')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Password</h6>
                            <input type="text" name="password" class="form-control form-control-sm @if($errors->has('password')) is-invalid @else border-dark @endif" value="{{ old('password') }}">
                            @error('password')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                            <br>
                            <h6>Role</h6>
                            <select name="role" class="form-control form-control-sm @if($errors->has('role')) is-invalid border-danger @else border-dark @endif">
                                <option value="">Pilih role</option>
                                <option value="user_admin" {{ old('role') == 'user_admin' ? 'selected' : '' }}>User Admin</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
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