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
        session()->flush();
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
        if($request->bulan && $request->bulan){
            $trainingFeedback = DB::table('training_feedback')->where([['bulan_pelaksanaan',$request->bulan], ['tahun_pelaksanaan',$request->tahun]])->get();
        }else{
            $trainingFeedback = [];
        }
        $data_tahun = DB::table('training_feedback')->select('tahun_pelaksanaan')->distinct()->get();
        $data = [
            'training_feedback' => $trainingFeedback,
            'data_tahun' => $data_tahun
        ];

        // var_dump($data_tahun);die;
        return view('admin.lim-1', $data);
    }

    public function lim_2(){
        return view('admin.lim-2');
    }
    public function lim_2_detail(){
        return view('admin.lim-2-detail');
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

}
