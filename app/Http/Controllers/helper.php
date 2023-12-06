<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class helper extends Controller
{
    public function training_evaluation_keterangan($pre_test, $post_test){
        if ($pre_test <= 50 && $post_test <= 50) {
            return 'Deadwood';
        } elseif($pre_test <= 100 && $pre_test >= 51 && $post_test <= 50) {
            return 'Inconsistent';
        } elseif($pre_test <= 100 && $post_test <= 75 && $post_test >= 51) {
            return 'Continuity Learner';
        } elseif($pre_test <= 75 && $post_test <= 100 && $post_test >= 76) {
            return 'High Profesional Learner';
        } elseif($pre_test <= 100 && $pre_test >= 76 && $post_test <= 100 && $post_test >= 76) {
            return 'Consistence Star';
        } else{
            return 'tidak terdeteksi';
        }
        
    }

    public function tgl_indo($tanggal, $param)
    {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $hari = array (
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
    
        $bagi_jam_hari = explode(' ', $tanggal);
        $pecahkan_jam = explode(':', $bagi_jam_hari[1]);
        $pecahkan = explode('-', $bagi_jam_hari[0]);
        $buat_hari = date("l", mktime(0,0,0,$pecahkan[1],$pecahkan[2],$pecahkan[0]));
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal
        if ($param == 'lengkap') {
          $return = $hari[$buat_hari] . ', ' . $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ' . $pecahkan_jam[0] . ':' . $pecahkan_jam[1];
        }elseif ($param == 'hanya tanggal') {
          $return = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }elseif ($param == 'tanggal dan jam') {
          $return = $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ' . $pecahkan_jam[0] . ':' . $pecahkan_jam[1] . ':' . $pecahkan_jam[2];
        }

        return $return;
    } 

    public function bulan($angka){
        if ($angka == 1) {
            return 'Januari';
        } elseif ($angka == 2) {
            return 'Februari';
        } elseif ($angka == 3) {
            return 'Maret';
        } elseif ($angka == 4) {
            return 'April';
        } elseif ($angka == 5) {
            return 'Mei';
        } elseif ($angka == 6) {
            return 'Juni';
        } elseif ($angka == 7) {
            return 'Juli';
        } elseif ($angka == 8) {
            return 'Agustus';
        } elseif ($angka == 9) {
            return 'September';
        } elseif ($angka == 10) {
            return 'Oktober';
        } elseif ($angka == 11) {
            return 'November';
        } elseif ($angka == 12) {
            return 'Desember';
        }
        
    }

    public function nama_user($username){
        $return = DB::table('users')->where('username', $username)->first();
        return $return->name;
    }
}
