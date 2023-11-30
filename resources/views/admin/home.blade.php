@extends('layout.admin-layout')
@section('content')
    
<div class="row" style="height: 95%">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Welcome,</h2>
            <p class="mb-md-0">Dashboard Fiber Academy Training Feedback</p>
          </div>
      </div>
    </div>
</div>

@if (session('berhasil-masuk'))
<script>alert('{{ session('berhasil-masuk') }}')</script>
@endif
@endsection