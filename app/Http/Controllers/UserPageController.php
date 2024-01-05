<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserPageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function lim1(){
        $data_bulan_tahun = DB::table('show_bulans')->where('id', 1)->first();
        $data_region = DB::table('training_feedback')->select('regional_penyelenggara')
                        ->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan]])
                        ->groupBy('regional_penyelenggara')->orderBy('regional_penyelenggara', 'asc')->get();
        $data_feedback = DB::table('training_feedback')
                        ->select('nama_pelatihan', DB::raw('count(*) as total'))
                        ->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan]])
                        ->groupBy('nama_pelatihan')->orderBy('total', 'desc')->get();
        $data_feedback_count = DB::table('training_feedback')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan]])->count();

        $all_feedback_title = '';
        $all_feedback_value = '';
        // $title_max = 1;
        // $zero = 0;
        foreach($data_feedback as $df){
            // if($zero < $title_max) { 
            //     $all_feedback_title .= "'". $df->nama_pelatihan . "',";
            //     $zero++;
            // }
            $all_feedback_title .= "'". $df->nama_pelatihan . "',";
            $all_feedback_value .= $df->total . ',';
        }

        // data feedback per region
        $data_feedback_per_region = DB::table('training_feedback')
                        ->select(
                                'regional_penyelenggara', 
                                DB::raw('avg(feedback_support_1) as feedback_support_1'),
                                DB::raw('avg(feedback_support_2) as feedback_support_2'),
                                DB::raw('avg(feedback_support_3) as feedback_support_3'),
                                DB::raw('avg(feedback_facilitator_1) as feedback_facilitator_1'),
                                DB::raw('avg(feedback_facilitator_2) as feedback_facilitator_2'),
                                DB::raw('avg(feedback_facilitator_3) as feedback_facilitator_3'),
                                DB::raw('avg(feedback_facilities_1) as feedback_facilities_1'),
                                DB::raw('avg(feedback_facilities_2) as feedback_facilities_2'),
                                DB::raw('avg(feedback_facilities_3) as feedback_facilities_3')
                                )
                        ->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan]])
                        ->groupBy('regional_penyelenggara')->orderBy('regional_penyelenggara', 'asc')->get();

        $data_feedback_per_region_title = '';
        $data_feedback_support = [];
        $data_feedback_facilitator = [];
        $data_feedback_facilities = [];
        $region_now = '';
        foreach($data_feedback_per_region as $dfpr){
            $data_feedback_per_region_title .= "'". $dfpr->regional_penyelenggara . "',";
            $region_now = $dfpr->regional_penyelenggara;
            if (!isset($data_feedback_support[$region_now])) {
                $data_feedback_support[$region_now] = ($dfpr->feedback_support_1 + $dfpr->feedback_support_2 + $dfpr->feedback_support_3)/3;
                $data_feedback_facilitator[$region_now] = ($dfpr->feedback_facilitator_1 + $dfpr->feedback_facilitator_2 + $dfpr->feedback_facilitator_3)/3;
                $data_feedback_facilities[$region_now] = ($dfpr->feedback_facilities_1 + $dfpr->feedback_facilities_2 + $dfpr->feedback_facilities_3)/3;
            }else {
                $data_feedback_support[$region_now] = ($data_feedback_support[$region_now] + (($dfpr->feedback_support_1 + $dfpr->feedback_support_2 + $dfpr->feedback_support_3)/3)/2);
                $data_feedback_facilitator[$region_now] = ($data_feedback_facilitator[$region_now] + (($dfpr->feedback_facilitator_1 + $dfpr->feedback_facilitator_2 + $dfpr->feedback_facilitator_3)/3)/2);
                $data_feedback_facilities[$region_now] = ($data_feedback_facilities[$region_now] + (($dfpr->feedback_facilities_1 + $dfpr->feedback_facilities_2 + $dfpr->feedback_facilities_3)/3)/2);
            }
        }

        // echo '<pre>';
        // var_dump($data_region);die;

        $data = [
            'data_feedback' => $data_feedback,
            'data_feedback_count' => $data_feedback_count,
            'all_feedback_title' => $all_feedback_title,
            'all_feedback_value' => $all_feedback_value,
            'data_feedback_per_region_title' => $data_feedback_per_region_title,
            'data_feedback_support' => $data_feedback_support,
            'data_feedback_facilitator' => $data_feedback_facilitator,
            'data_feedback_facilities' => $data_feedback_facilities,
            'data_region' => $data_region,
            'data_bulan' => $data_bulan_tahun->bulan_pelaksanaan,
            'data_tahun' => $data_bulan_tahun->tahun_pelaksanaan,
        ];

        return view('pages.lim1', $data);
    }

    public function lim2(){
        $data_bulan_tahun = DB::table('show_bulans')->where('id', 1)->first();
        $data_evaluation = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan]])->get();

        // Jumlah masing masing keterangan
        $count_cs = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan],['keterangan', 'consistence star']])->count();
        $count_cl = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan],['keterangan', 'continuity learner']])->count();
        $count_hpl = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan],['keterangan', 'high profesional learner']])->count();
        $count_i = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan],['keterangan', 'inconsistent']])->count();
        $count_d = DB::table('training_evaluations')->where([['bulan_pelaksanaan', $data_bulan_tahun->bulan_pelaksanaan],['tahun_pelaksanaan', $data_bulan_tahun->tahun_pelaksanaan],['keterangan', 'deadwood']])->count();

        // Data pretest postest boxplot
        $boxplot_pre_test = '';
        $boxplot_post_test = '';

        foreach($data_evaluation as $de){
            $boxplot_pre_test .= $de->nilai_pre_test . ',';
            $boxplot_post_test .= $de->nilai_post_test . ',';
        }

        // Data pretest postest scatter
        $scatter_cs = '';
        $scatter_cl = '';
        $scatter_hpl = '';
        $scatter_i = '';
        $scatter_d = '';
        foreach($data_evaluation as $de){
            if($de->keterangan == 'consistence star'){
                $scatter_cs .= '{x: '. $de->nilai_pre_test .',y: '. $de->nilai_post_test .'},';
            }elseif($de->keterangan == 'continuity learner') {
                $scatter_cl .= '{x: '. $de->nilai_pre_test .',y: '. $de->nilai_post_test .'},';
            }elseif($de->keterangan == 'high profesional learner') {
                $scatter_hpl .= '{x: '. $de->nilai_pre_test .',y: '. $de->nilai_post_test .'},';
            }elseif($de->keterangan == 'inconsistent') {
                $scatter_i .= '{x: '. $de->nilai_pre_test .',y: '. $de->nilai_post_test .'},';
            }elseif($de->keterangan == 'deadwood') {
                $scatter_d .= '{x: '. $de->nilai_pre_test .',y: '. $de->nilai_post_test .'},';
            }
        }

        // Data pretest postest table
        $regional = DB::table('regions')->orderBy('region', 'asc')->get();

        // echo'<pre>';
        // var_dump($pre_post_table_cs);die;

        $data = [
            'data_evaluation' => $data_evaluation,
            'count_cs' => $count_cs,
            'count_cl' => $count_cl,
            'count_hpl' => $count_hpl,
            'count_i' => $count_i,
            'count_d' => $count_d,
            'boxplot_pre_test' => $boxplot_pre_test,
            'boxplot_post_test' => $boxplot_post_test,
            'scatter_cs' => $scatter_cs,
            'scatter_cl' => $scatter_cl,
            'scatter_hpl' => $scatter_hpl,
            'scatter_i' => $scatter_i,
            'scatter_d' => $scatter_d,
            'regional' => $regional,
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
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
        
        session()->flash('status-sukses', 'Data berhasil disimpan, Terimakasih telah melakukan pengisian form feedback');
        return redirect('/form-feedback');
    }
}
