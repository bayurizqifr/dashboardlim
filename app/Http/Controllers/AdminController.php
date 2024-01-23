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

        $data_tahun = DB::table('training_evaluations')->select('tahun_pelaksanaan')->distinct()->get();
        
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

}
