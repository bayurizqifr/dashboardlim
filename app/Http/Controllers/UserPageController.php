<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserPageController extends Controller
{
    public function lim2(){
        $data_bulan_tahun = DB::table('show_data')->where('id', 1)->first();
        $data_evaluation = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun]])->get();
        $count_cs = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun],['keterangan', 'consistence star']])->count();
        $count_cl = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun],['keterangan', 'continuity learner']])->count();
        $count_hpl = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun],['keterangan', 'high profesional learner']])->count();
        $count_i = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun],['keterangan', 'inconsistent']])->count();
        $count_d = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan],['tahun_pelaksanaan', $data_bulan_tahun->tahun],['keterangan', 'deadwood']])->count();
        $data = [
        //     'data_nama_pelatihan' => $data_nama_pelatihan,
        //     'data_region' => $data_region,
        //     'data_witel' => $data_witel,
        ];

        return view('pages.lim2', $data);
    }

    public function form_feedback_page(){
        // untuk form input
        $data_nama_pelatihan = DB::table('nama_pelatihans')->get();
        $data_region = DB::table('regions')->get();
        $data_witel = DB::table('witels')->get();

        $data = [
            'data_nama_pelatihan' => $data_nama_pelatihan,
            'data_region' => $data_region,
            'data_witel' => $data_witel,
        ];

        return view('pages.feedback', $data);
    }

    public function form_feedback_upload(Request $request){
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'nama_perusahaan' => 'required',
            'nama_pelatihan' => 'required',
            'tgl_mulai_training' => 'required',
            'tgl_akhir_training' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'region' => 'required',
            'witel' => 'required',
            'feedback_rencana' => 'required',
            'feedback_saran' => 'required',
            'feedback_support_1' => 'required',
            'feedback_support_2' => 'required',
            'feedback_support_3' => 'required',
            'feedback_facilitator_1' => 'required',
            'feedback_facilitator_2' => 'required',
            'feedback_facilitator_3' => 'required',
            'feedback_facilities_1' => 'required',
            'feedback_facilities_2' => 'required',
            'feedback_facilities_3' => 'required',
            'feedback_manfaat' => 'required',
            'feedback_antusias' => 'required',
        ],[
            'required' => 'Field :attribute tidak boleh kosong',
        ]); 

        DB::table('training_feedback')->insert([
            'bulan_pelaksanaan' => $request->bulan,
            'tahun_pelaksanaan' => $request->tahun,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama,
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_pelatihan' => $request->nama_pelatihan,
            'tgl_mulai_training' => $request->tgl_mulai_training,
            'tgl_akhir_training' => $request->tgl_akhir_training,
            'regional_penyelenggara' => $request->region,
            'witel_penyelenggara' => $request->witel,
            'feedback_rencana' => $request->feedback_rencana,
            'feedback_saran' => $request->feedback_saran,
            'feedback_support_1' => $request->feedback_support_1,
            'feedback_support_2' => $request->feedback_support_2,
            'feedback_support_3' => $request->feedback_support_3,
            'feedback_facilitator_1' => $request->feedback_facilitator_1,
            'feedback_facilitator_2' => $request->feedback_facilitator_2,
            'feedback_facilitator_3' => $request->feedback_facilitator_3,
            'feedback_facilities_1' => $request->feedback_facilities_1,
            'feedback_facilities_2' => $request->feedback_facilities_2,
            'feedback_facilities_3' => $request->feedback_facilities_3,
            'feedback_manfaat' => $request->feedback_manfaat,
            'feedback_antusias' => $request->feedback_antusias,
        ]);
        
        session()->flash('status-sukses', 'Data berhasil disimpan, Terimakasih telah melakukan pengisian form feedback');
        return redirect('/form-feedback');
    }
}
