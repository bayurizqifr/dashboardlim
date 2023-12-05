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

    public function logout_useradmin()
    {
        session()->flush();
        session()->forget(['user_admin', 'role']);
        return redirect('/login');
    }

    public function login_useradmin_cek(Request $request)
    {
        $user = DB::table('users')->where([['username', $request->username], ['password', $request->password]])->first();

        if ($user->role == 'user_admin') {
            session([
                'user_admin' => true,
                'role' => $user->role,
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
}
