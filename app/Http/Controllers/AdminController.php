<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // ============================================================ HALAMAN HOME
    public function login_admin(){
        if (session('admin')) {
            return redirect('/admin/dashboard');
        }else{
            return view('admin.login-admin');
        }
    }

    public function logout_admin(){
        // session()->flush();
        session()->forget(['admin', 'role']);
        return redirect('/login-admin');
    }

    public function login_admin_cek(Request $request){
        $user = DB::table('users')->where([['username', $request->username], ['password', $request->password]])->first();

        if ($user->role == 'admin' || $user->role == 'super_admin') {
            session([
                'admin' => true,
                'role' => $user->role,
            ]);
            session()->flash('berhasil-masuk', 'Selamat datang '.$request->username);
            return redirect('/admin/dashboard');
        }else{
            session()->flash('gagal-masuk', 'Username / Password salah');
            return redirect('/login-admin');
        }
    }

    public function home(){
        return view('admin.home');
    }

    public function lim_1(Request $request){
        if($request->b && $request->t){
            $trainingFeedback = DB::table('training_feedback')->where([['bulan_pelaksanaan',$request->b], ['tahun_pelaksanaan',$request->t]])->get();
        }else{
            $trainingFeedback = [];
        }

        // untuk form input
        $data_nama_pelatihan = DB::table('nama_pelatihans')->get();
        $data_region = DB::table('regions')->get();
        $data_witel = DB::table('witels')->get();
        
        // untuk search
        $data_tahun = DB::table('training_feedback')->select('tahun_pelaksanaan')->distinct()->get();

        $data = [
            'training_feedback' => $trainingFeedback,
            'data_tahun' => $data_tahun,
            'data_nama_pelatihan' => $data_nama_pelatihan,
            'data_region' => $data_region,
            'data_witel' => $data_witel,
        ];

        // var_dump($data_tahun);die;
        return view('admin.lim-1', $data);
    }

    public function lim_2(Request $request){
        if($request->b && $request->t){
            $trainingEvaluations = DB::table('training_evaluations')->where([['bulan_pelaksanaan',$request->b], ['tahun_pelaksanaan',$request->t]])->groupBy('bulan_pelaksanaan', 'tahun_pelaksanaan', 'username_uploader', 'nama_pelatihan')->get();
        }else{
            $trainingEvaluations = [];
        }

        $data_tahun = DB::table('training_feedback')->select('tahun_pelaksanaan')->distinct()->get();
        $data = [
            'training_evaluations' => $trainingEvaluations,
            'data_tahun' => $data_tahun
        ];
        return view('admin.lim-2', $data);
    }
    
    public function lim_2_detail(Request $request){
        $data_upload = DB::table('training_evaluations')->where([['username_uploader', $request->username],['bulan_pelaksanaan', $request->b],['tahun_pelaksanaan', $request->t],['nama_pelatihan', $request->nama_pelatihan]])->get();
        $data_detail = DB::table('training_evaluations')->where([['username_uploader', $request->username],['bulan_pelaksanaan', $request->b],['tahun_pelaksanaan', $request->t],['nama_pelatihan', $request->nama_pelatihan]])->first();

        // var_dump($data_upload);die;

        $data = [
            'data_detail' => $data_detail,
            'data_upload' => $data_upload,
        ];
        return view('admin.lim-2-detail', $data);
    }
    
    public function lim_2_delete(Request $request){
        DB::table('training_evaluations')->where([['username_uploader', $request->username],['bulan_pelaksanaan', $request->b],['tahun_pelaksanaan', $request->t],['nama_pelatihan', $request->nama_pelatihan]])->delete();

        session()->flash('status-sukses', 'data berhasil dihapus');
        return redirect('/admin/lim-2?b='.$request->b.'&t='.$request->t);
    }

    public function add_user(){
        $user = DB::table('users')->get();
        $data = [
            'user' => $user
        ];
        return view('admin.add-user', $data);
    }

    public function add_pelatihan(){
        $pelatihan = DB::table('nama_pelatihans')->get();
        $data = [
            'pelatihan' => $pelatihan
        ];
        return view('admin.add-pelatihan', $data);
    }

    public function add_pelatihan_csv_upload(Request $request){        
        $rawdata = [];
        if($request->csv->extension() !== 'txt'){
            session()->flash('csv-gagal', 'File CSV tidak dapat dibaca');
            return redirect('/admin/add-pelatihan');
        }else{
            $data = $request->csv->path();
            $file = fopen($data,"r");

            echo '<pre>';
            while(! feof($file)){
                $open = fgetcsv($file);
                if($open !== false){
                    array_push($rawdata, $open);
                }
            }

            fclose($file);
        }

        unset($rawdata[0]);

        foreach($rawdata as $rd){
            $open = explode(';',$rd[0]);
            if(isset($open[1])){
                DB::statement('INSERT INTO `nama_pelatihans` (`nama_pelatihan`, `id_nama_pelatihan`, `type_pelatihan`, `type_id_pelatihan`) VALUES ("'.$open[0].'","'.$open[1].'","'.$open[2].'","'.$open[3].'")');
            }
        }        

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/admin/add-pelatihan');
    }

    public function add_region(){
        $region = DB::table('regions')->get();
        $data = [
            'region' => $region
        ];
        return view('admin.add-region', $data);
    }

    public function add_witel(){
        $witel = DB::table('witels')->get();
        $data = [
            'witel' => $witel
        ];
        return view('admin.add-witel', $data);
    }

    public function edit_showing(){
        $show = DB::table('show_bulans')->where('id', 1)->first();
        $data = [
            'show' => $show
        ];
        return view('admin.edit-showing', $data);
    }

    public function edit_showing_edit(Request $request){
        DB::table('show_bulans')->where('id', 1)->update(['bulan_pelaksanaan' => $request->bulan, 'tahun_pelaksanaan' => $request->tahun]);
        session()->flash('status-sukses', 'data berhasil diubah');
        return redirect('/admin/edit-showing');
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

        return view('admin.lim1', $data);
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

        return view('admin.lim2', $data);
    }
}
