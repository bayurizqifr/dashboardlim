<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserAdminController extends Controller
{
    //

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
            ]);

            //  var_dump($user); die;
            session()->flash('berhasil-masuk', 'Selamat datang '.$request->username);
            return redirect('/upload');
        }else{
            session()->flash('gagal-masuk', 'Username / Password salah');
            return redirect('/login');
        }
    }

    public function home()
    {
        return view('pages.send-files');
    }

    public function logout()
    {
        session()->flush();
        session()->forget(['user_admin', 'user_admin_role']);
        return redirect('/home');
    }
}
