<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ============================================================ HALAMAN HOME
    public function login_admin(){
        return view('admin.login-admin');
    }

    public function home(){
        return view('admin.home');
    }

    public function lim_1(){
        return view('admin.lim-1');
    }

    public function lim_2(){
        return view('admin.lim-2');
    }
    public function lim_2_detail(){
        return view('admin.lim-2-detail');
    }

    public function add_user(){
        return view('admin.add-user');
    }

    public function add_user_add(){
        return view('admin.add-user-add');
    }
}
