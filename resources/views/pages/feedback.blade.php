@extends('layouts.layoutlim')
@section('content')

@if (session('status-sukses'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {!! session('status-sukses') !!}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        Gagal menyimpan data. Isikan data dengan benar
    </div>
@endif

<div class="row m-3 text-dark">
    <div class="col-12 mt-3">
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 text-center">
                        <img src="/images/logo.png" alt="" srcset="" style="width: 130px">
                    </div>
                    <div class="col-9">
                        <h3>Feedback Training</h3>
                        <p>Terima kasih telah mengikuti training yang kami selenggarakan. Mohon kesediaannya untuk mengisi form feedback ini sebagai bahan evaluasi kami untuk kedepannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <hr class="mt-3" style="width: 100%;"> --}}
    <div class="col-12">
        <div class="card w-75 mx-auto">
            <form action="/form-feedback-upload" method="post">
                @csrf
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-12 mb-3">
                            <h5>Data Peserta</h5>
                            <hr>
                        </div>
                        <div class="col-4 mb-3">
                            <h6>NIK</h6>
                            <input type="text" name="nik" class="form-control" style="border-radius: 3px;" value="{{ old('nik') }}">
                            @error('nik')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <h6>Nama Lengkap</h6>
                            <input type="text" name="nama" class="form-control" style="border-radius: 3px;" value="{{ old('nama') }}">
                            @error('nama')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <h6>Nama Perusahaan</h6>
                            <select name="nama_perusahaan" id="select-perusahaan">
                                <option value=""></option>
                                <option value="PT TELKOM AKSES" {{ old('nama_perusahaan') == 'PT TELKOM AKSES' ? 'selected' : '' }}>PT TELKOM AKSES</option>
                                <option value="MITRA" {{ old('nama_perusahaan') == 'MITRA' ? 'selected' : '' }}>MITRA</option>
                            </select>
                            @error('nama_perusahaan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <h6>Nama Pelatihan</h6>
                            <select name="nama_pelatihan" id="select-pelatihan">
                                <option value=""></option>
                                @foreach ($data_nama_pelatihan as $row)
                                    <option value="{{ $row->nama_pelatihan }}" {{ old('nama_pelatihan') == $row->nama_pelatihan ? 'selected' : '' }}>{{ $row->nama_pelatihan }}</option>
                                @endforeach
                            </select>
                            @error('nama_pelatihan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <h6>Tgl Mulai Training</h6>
                            <input type="date" name="tgl_mulai_training" class="form-control" style="border-radius: 3px;" value="{{ old('tgl_mulai_training') }}">
                            @error('tgl_mulai_training')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <h6>Tgl Akhir Training</h6>
                            <input type="date" name="tgl_akhir_training" class="form-control" style="border-radius: 3px;" value="{{ old('tgl_akhir_training') }}">
                            @error('tgl_akhir_training')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <h6>Bulan Pelaksanaan Training</h6>
                            <select name="bulan" id="select-bulan" style="border-radius: 3px;">
                                <option value="">Pilih bulan</option>
                                <option value="1" {{ old('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ old('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ old('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ old('bulan') == '4' ? 'selected' : '' }}>April</option>
                                <option value="5" {{ old('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ old('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ old('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ old('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ old('bulan') == '9' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ old('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ old('bulan') == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ old('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                            </select>
                            @error('bulan')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <h6>Tahun Pelaksanaan Training</h6>
                            <input name="tahun" type="number" class="form-control" min="2000" max="2200" style="border-radius: 3px;" value="{{ old('tahun') }}">
                            @error('tahun')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <h6>Region Penyelenggara</h6>
                            <select name="region" id="select-region">
                                <option value=""></option>
                                @foreach ($data_region as $row)
                                    <option value="{{ $row->region }}" {{ old('region') == $row->region ? 'selected' : '' }}>{{ $row->region }}</option>
                                @endforeach
                            </select>
                            @error('region')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <h6>Witel Penyelenggara</h6>
                            <select name="witel" id="select-witel">
                                <option value=""></option>
                                @foreach ($data_witel as $row)
                                    <option value="{{ $row->witel }}" {{ old('witel') == $row->witel ? 'selected' : '' }}>{{ $row->witel }}</option>
                                @endforeach
                            </select>
                            @error('witel')
                                <p class="text-danger mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4 mb-3"></div>
                        <div class="col-12 my-3">
                            <h5>Content</h5>
                            <hr>
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Materi pelatihan sesuai dengan kebutuhan peserta</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_1" value="1" {{ old('feedback_support_1') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_1" value="2" {{ old('feedback_support_1') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_1" value="3" {{ old('feedback_support_1') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_1" value="4" {{ old('feedback_support_1') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_1" value="5" {{ old('feedback_support_1') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_support_1')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Materi pelatihan data diterima dan diterapkan dengan mudah</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_2" value="1" {{ old('feedback_support_2') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_2" value="2" {{ old('feedback_support_2') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_2" value="3" {{ old('feedback_support_2') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_2" value="4" {{ old('feedback_support_2') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_2" value="5" {{ old('feedback_support_2') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_support_2')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Materi pelatihan disampaikan dengan urut dan sistematis</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_3" value="1" {{ old('feedback_support_3') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_3" value="2" {{ old('feedback_support_3') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_3" value="3" {{ old('feedback_support_3') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_3" value="4" {{ old('feedback_support_3') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_support_3" value="5" {{ old('feedback_support_3') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_support_3')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <h5>Facilitator</h5>
                            <hr>
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Instruktur menguasai materi yang disampaikan</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_1" value="1" {{ old('feedback_facilitator_1') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_1" value="2" {{ old('feedback_facilitator_1') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_1" value="3" {{ old('feedback_facilitator_1') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_1" value="4" {{ old('feedback_facilitator_1') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_1" value="5" {{ old('feedback_facilitator_1') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilitator_1')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Instruktur aktif berinteraksi 2 arah kepada peserta</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_2" value="1" {{ old('feedback_facilitator_2') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_2" value="2" {{ old('feedback_facilitator_2') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_2" value="3" {{ old('feedback_facilitator_2') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_2" value="4" {{ old('feedback_facilitator_2') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_2" value="5" {{ old('feedback_facilitator_2') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilitator_2')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Instruktur menyajikan materinya dengan jelas dan berurutan</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_3" value="1" {{ old('feedback_facilitator_3') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_3" value="2" {{ old('feedback_facilitator_3') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_3" value="3" {{ old('feedback_facilitator_3') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_3" value="4" {{ old('feedback_facilitator_3') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilitator_3" value="5" {{ old('feedback_facilitator_3') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilitator_3')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <h5>Facility & Acomodation</h5>
                            <hr>
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Ruangan Kelas nyaman bagi peserta</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_1" value="1" {{ old('feedback_facilities_1') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_1" value="2" {{ old('feedback_facilities_1') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_1" value="3" {{ old('feedback_facilities_1') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_1" value="4" {{ old('feedback_facilities_1') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_1" value="5" {{ old('feedback_facilities_1') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilities_1')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Konsumsi yang tersedia memuaskan bagi peserta</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_2" value="1" {{ old('feedback_facilities_2') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_2" value="2" {{ old('feedback_facilities_2') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_2" value="3" {{ old('feedback_facilities_2') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_2" value="4" {{ old('feedback_facilities_2') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_2" value="5" {{ old('feedback_facilities_2') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilities_2')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Alat dan sarana praktek lengkap</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Sesuai</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_3" value="1" {{ old('feedback_facilities_3') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_3" value="2" {{ old('feedback_facilities_3') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_3" value="3" {{ old('feedback_facilities_3') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_3" value="4" {{ old('feedback_facilities_3') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_facilities_3" value="5" {{ old('feedback_facilities_3') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Sesuai</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_facilities_3')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <h5>Kritik dan Saran</h5>
                            <hr>
                        </div>
                        <div class="col-12 mb-3">
                            <h6>Apa rencana anda setelah mengikuti pelatihan ini agar bisa diimplementasikan pada pekerjaan anda?</h6>
                            <textarea name="feedback_rencana" class="form-control" style="border-radius: 3px;">{{ old('feedback_rencana') }}</textarea>
                            @error('feedback_rencana')
                                <p class="text-danger mb-0">Field tidak boleh kosong</p>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <h6>Apa saran anda untuk pelatihan ini?</h6>
                            <textarea name="feedback_saran" class="form-control" style="border-radius: 3px;">{{ old('feedback_saran') }}</textarea>
                            @error('feedback_saran')
                                <p class="text-danger mb-0">Field tidak boleh kosong</p>
                            @enderror
                        </div>
                        <div class="col-12 my-3">
                            <h5>Rating dan NPS</h5>
                            <hr>
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">Seberapa manfaat pelatihan ini untuk mendukung pekerjaan anda</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Bermanfaat</i></b></td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_manfaat" value="1" {{ old('feedback_manfaat') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_manfaat" value="2" {{ old('feedback_manfaat') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_manfaat" value="3" {{ old('feedback_manfaat') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_manfaat" value="4" {{ old('feedback_manfaat') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-5">
                                        <input type="radio" name="feedback_manfaat" value="5" {{ old('feedback_manfaat') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td><b><i>Sangat Bermanfaat</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_manfaat')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <h6 class="text-center mb-4">seberapa antusiaskah anda akan merekomendasikan pelatihan ini kepada rekan anda?</h6>
                            <table class="w-100 text-center">
                                <tr>
                                    <td><b><i>Sangat Tidak Antusias</i></b></td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="1" {{ old('feedback_antusias') == 1 ? 'checked' : '' }}>
                                        <label for="1">1</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="2" {{ old('feedback_antusias') == 2 ? 'checked' : '' }}>
                                        <label for="2">2</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="3" {{ old('feedback_antusias') == 3 ? 'checked' : '' }}>
                                        <label for="3">3</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="4" {{ old('feedback_antusias') == 4 ? 'checked' : '' }}>
                                        <label for="4">4</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="5" {{ old('feedback_antusias') == 5 ? 'checked' : '' }}>
                                        <label for="5">5</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="6" {{ old('feedback_antusias') == 6 ? 'checked' : '' }}>
                                        <label for="6">6</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="7" {{ old('feedback_antusias') == 7 ? 'checked' : '' }}>
                                        <label for="7">7</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="8" {{ old('feedback_antusias') == 8 ? 'checked' : '' }}>
                                        <label for="8">8</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="9" {{ old('feedback_antusias') == 9 ? 'checked' : '' }}>
                                        <label for="9">9</label>
                                    </td>
                                    <td class="px-2">
                                        <input type="radio" name="feedback_antusias" value="10" {{ old('feedback_antusias') == 10 ? 'checked' : '' }}>
                                        <label for="10">10</label>
                                    </td>
                                    <td><b><i>Sangat Antusias</i></b></td>
                                </tr>
                            </table>
                            @error('feedback_antusias')
                                <div class="text-center"><p class="text-danger mb-0">Field tidak boleh kosong</p></div>
                            @enderror
                        </div>
                        <hr>
                        <div class="col-12 mt-2 text-center">
                            <button type="submit" class="btn btn-success w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    new TomSelect("#select-perusahaan",{
        create: false,
        sortField: {
            field: "text",
            direction: "desc"
        }
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
    new TomSelect("#select-bulan",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
</script>
@stop