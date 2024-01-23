@extends('layouts.master')
@section('content')

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/fa1.jpeg">
                    </div>
                    <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/fa2.jpg">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">About Us</p>
                <h1 class="display-5 mb-4">Fiber Academy</h1>
                <p class="mb-4">Merupakan pusat pengembangan kompetensi jaringan akses khususnya pada keahlian jaringan fiber optik, direktori dan silabus kompetensi disetiap portfolio, fasilitas e-learning, program-program sertifikasi yang didukung fiber optic expert trainers
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid facts my-5 p-5">
    <div class="row g-5">
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center border p-5">
                <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">61</h1>
                <span class="fs-5 fw-semi-bold text-white">Area Ter-Cover</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0">18k+</h1>
                <span class="fs-5 fw-semi-bold text-white">Karyawan</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
            <div class="text-center border p-5">
                <i class="fa fa-users fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">7</h1>
                <span class="fs-5 fw-semi-bold text-white">Regional</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
            <div class="text-center border p-5">
                <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">29</h1>
                <span class="fs-5 fw-semi-bold text-white">Teritori</span>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative me-lg-4">
                    <img class="img-fluid w-100" src="img/fa3.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Kegiatan di Fiber Academy</h1>
                <p class="mb-4">Telkom Akses mengkedepankan keunggulan kompetensi jaringan broadband melalui penyediaan infrastruktur fiber optik learning academy dan memiliki komitmen yang kuat dalam pengembangan keahlian sumber daya manusia yang melalui Fiber Academy dan Lembaga Sertifikasi Profesi (LSP) yang terlisensi BNSP.
                </p>
                <p class="mb-4">Kami memiliki 61 lokasi pelatihan di seluruh Indonesia dan Lembaga Sertifikasi Profesi (LSP) berlisensi BNSP dalam pengembangan kompetensi sumber daya manusia guna memenuhi kebutuhan customer meliputi proses perencanaan, pembangunan dan operasi pemeliharaan jaringan fiber optik.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->

<!-- Project Start -->
<div class="container-fluid bg-dark pt-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Our Documentation</p>
        <h1 class="display-5 text-white mb-5">Kegiatan Kami di FA</h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        <a class="project-item" href="">
            <img class="img-fluid" src="img/kfa1.jpg" alt="">
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/kfa2.jpg" alt="">
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/kfa3.jpg" alt="">
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/kfa4.jpg" alt="">
        </a>
        <a class="project-item" href="">
            <img class="img-fluid" src="img/fa2.jpg" alt="">
        </a>
    </div>
</div>
<!-- Project End -->
@stop