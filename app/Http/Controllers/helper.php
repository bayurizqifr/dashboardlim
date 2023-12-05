<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
