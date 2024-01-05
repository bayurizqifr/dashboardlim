<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserAdminController extends Controller
{
    public function upload()
    {
        $data_upload = DB::table('training_evaluations')->where('username_uploader', session('user_admin_username'))->groupBy('bulan_pelaksanaan', 'tahun_pelaksanaan', 'nama_pelatihan')->get();
        $data_nama_pelatihan = DB::table('nama_pelatihans')->get();
        $data_region = DB::table('regions')->get();
        $data_witel = DB::table('witels')->get();

        $data = [
            'data_upload' => $data_upload,
            'data_nama_pelatihan' => $data_nama_pelatihan,
            'data_region' => $data_region,
            'data_witel' => $data_witel,
        ];
        return view('pages.send-files', $data);
    }

    public function upload_detail(Request $request)
    {
        $data_upload = DB::table('training_evaluations')->where([['username_uploader', session('user_admin_username')],['bulan_pelaksanaan', $request->b],['tahun_pelaksanaan', $request->t]])->get();
        $data_detail = DB::table('training_evaluations')->where([['username_uploader', session('user_admin_username')],['bulan_pelaksanaan', $request->b],['tahun_pelaksanaan', $request->t]])->first();

        $data = [
            'data_detail' => $data_detail,
            'data_upload' => $data_upload,
        ];
        return view('pages.send-files-detail', $data);
    }

    public function login_useradmin()
    {
        if (session('user_admin')) {
            return redirect('/upload');
        }else{
            return view('pages.login');
        }
    }

    public function login_useradmin_cek(Request $request)
    {
        $user = DB::table('users')->where([['username', $request->username], ['password', $request->password], ['role', 'user_admin']])->first();

        if (isset($user->role)) {
            session([
                'user_admin' => true,
                'user_admin_role' => $user->role,
                'user_admin_username' => $user->username,
            ]);

            //  var_dump($user); die;
            session()->flash('berhasil-masuk', 'Selamat datang '.$request->username);
            return redirect('/upload');
        }else{
            session()->flash('gagal-masuk', 'Username / Password salah');
            return redirect('/login');
        }
    }

    public function logout()
    {
        // session()->flush();
        session()->forget(['user_admin', 'user_admin_role', 'user_admin_username']);
        return redirect('/home');
    }
}