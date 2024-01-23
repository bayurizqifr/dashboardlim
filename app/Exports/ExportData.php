<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportData implements FromCollection, WithHeadings
{
    protected $table,$bulan,$tahun;

    function __construct($table ,$bulan, $tahun) {
        $this->table = $table;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        if ($this->table == 'training_evaluations') {
            if ($this->bulan == '') {
                $print = DB::table($this->table)->select('bulan_pelaksanaan', 'tahun_pelaksanaan', 'username_uploader', 'regional', 'witel', 'nama_pelatihan', 'tgl_mulai_pelaksanaan', 'tgl_selesai_pelaksanaan', 'nik', 'nama', 'nama_instruktur', 'kehadiran', 'nilai_pre_test', 'nilai_post_test', 'keterangan', 'peningkatan_belajar')->where('tahun_pelaksanaan', $this->tahun)->get();
            }else{
                $print = DB::table($this->table)->select('bulan_pelaksanaan', 'tahun_pelaksanaan', 'username_uploader', 'regional', 'witel', 'nama_pelatihan', 'tgl_mulai_pelaksanaan', 'tgl_selesai_pelaksanaan', 'nik', 'nama', 'nama_instruktur', 'kehadiran', 'nilai_pre_test', 'nilai_post_test', 'keterangan', 'peningkatan_belajar')->where([['bulan_pelaksanaan', $this->bulan],['tahun_pelaksanaan', $this->tahun]])->get();
            }
        }elseif ($this->table == 'training_feedback') {
            if ($this->bulan == '') {
                $print = DB::table($this->table)->select('bulan_pelaksanaan', 'tahun_pelaksanaan', 'nik', 'nama_lengkap', 'nama_perusahaan', 'nama_pelatihan', 'tgl_mulai_training', 'tgl_akhir_training', 'regional_penyelenggara', 'witel_penyelenggara', 'feedback_rencana', 'feedback_saran', 'feedback_support_1', 'feedback_support_2', 'feedback_support_3', 'feedback_facilitator_1', 'feedback_facilitator_2', 'feedback_facilitator_3', 'feedback_facilities_1', 'feedback_facilities_2', 'feedback_facilities_3', 'feedback_manfaat', 'feedback_antusias', 'created_at')->where('tahun_pelaksanaan', $this->tahun)->get();
            }else{
                $print = DB::table($this->table)->select('bulan_pelaksanaan', 'tahun_pelaksanaan', 'nik', 'nama_lengkap', 'nama_perusahaan', 'nama_pelatihan', 'tgl_mulai_training', 'tgl_akhir_training', 'regional_penyelenggara', 'witel_penyelenggara', 'feedback_rencana', 'feedback_saran', 'feedback_support_1', 'feedback_support_2', 'feedback_support_3', 'feedback_facilitator_1', 'feedback_facilitator_2', 'feedback_facilitator_3', 'feedback_facilities_1', 'feedback_facilities_2', 'feedback_facilities_3', 'feedback_manfaat', 'feedback_antusias', 'created_at')->where([['bulan_pelaksanaan', $this->bulan],['tahun_pelaksanaan', $this->tahun]])->get();
            }
        }
        
        return $print;
    }

    public function headings() :array
    {
        if($this->table == 'training_evaluations'){
            $header = ['Bulan Pelaksanaan', 'Tahun Pelaksanaan', 'username pengupload', 'Regional', 'Witel', 'Nama Pelatihan', 'Tgl Mulai', 'Tgl Selesai', 'NIK', 'Nama', 'Nama Instruktur', 'Kehadiran', 'Pre-Test', 'Post-Test', 'Keterangan', 'Peningkatan Belajar (%)'];
        }elseif ($this->table == 'training_feedback') {
            $header = ['Bulan Pelaksanaan', 'Tahun Pelaksanaan', 'NIK', 'Nama Lengkap', 'Nama Perusahaan', 'Nama Pelatihan', 'Tgl Mulai Training', 'Tgl Akhir Training', 'Regional Penyelenggara', 'Witel Penyelenggara', 'Feedback Rencana', 'Feedback Saran', 'Feedback Support 1', 'Feedback Support 2', 'Feedback Support 3', 'Feedback Facilitator 1', 'Feedback Facilitator 2', 'Feedback Facilitator 3', 'Feedback Facilities 1', 'Feedback Facilities 2', 'Feedback Facilities 3', 'Feedback Manfaat', 'Feedback Antusias', 'Diupload Pada'];
        }
        
        return $header;
    }
}
