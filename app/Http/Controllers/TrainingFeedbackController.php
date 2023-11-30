<?php

namespace App\Http\Controllers;

use App\Models\TrainingFeedback;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingFeedbackRequest;
use App\Http\Requests\UpdateTrainingFeedbackRequest;

class TrainingFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'masuk';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingFeedbackRequest $request)
    {
        $rawdata = [];
        if($request->csv->extension() !== 'txt'){
            session()->flash('csv-gagal', 'File CSV tidak dapat dibaca');
            return 'tidak masuk pak haji';
        }else{
            $data = $request->csv->path();
            $file = fopen($data,"r");

            while(! feof($file)){
                $open = fgetcsv($file);

                if($open !== false){
                    $open = explode(';',$open[0]);
                    array_push($rawdata, [$request->bulan, $request->tahun, $open[0], $open[1], $open[2], $open[3], $open[4], $open[5], $open[6], $open[7], $open[8], $open[9], $open[10], $open[11], $open[12], $open[13], $open[14], $open[15], $open[16], $open[17], $open[18], $open[19]]);
                }
            }

            fclose($file);
        }

        unset($rawdata[0]);

        DB::table('training_feedback')->where([['bulan_pelaksanaan', $request->bulan], ['tahun_pelaksanaan', $request->tahun]])->delete();

        foreach($rawdata as $rd){
            $tgl_mulai = explode('/',$rd[6]);
            $rd[6] = $tgl_mulai[2].'-'.$tgl_mulai[1].'-'.$tgl_mulai[0];
            $tgl_akhir = explode('/',$rd[7]);
            $rd[7] = $tgl_akhir[2].'-'.$tgl_akhir[1].'-'.$tgl_akhir[0];
            TrainingFeedback::create([
                'bulan_pelaksanaan' => $rd[0],
                'tahun_pelaksanaan' => $rd[1],
                'nik' => $rd[2],
                'nama_lengkap' => $rd[3],
                'nama_perusahaan' => $rd[4],
                'nama_pelatihan' => $rd[5],
                'tgl_mulai_training' => $rd[6] == ''? null : $rd[6],
                'tgl_akhir_training' => $rd[7] == ''? null : $rd[7],
                'regional_penyelenggara' => $rd[8],
                'witel_penyelenggara' => $rd[9],
                'feedback_saran' => $rd[10],
                'feedback_support_1' => $rd[11],
                'feedback_support_2' => $rd[12],
                'feedback_support_3' => $rd[13],
                'feedback_facilitator_1' => $rd[14],
                'feedback_facilitator_2' => $rd[15],
                'feedback_facilitator_3' => $rd[16],
                'feedback_facilities_1' => $rd[17],
                'feedback_facilities_2' => $rd[18],
                'feedback_facilities_3' => $rd[19],
                'feedback_manfaat' => $rd[20],
                'feedback_antusias' => $rd[21],
            ]);
        }        

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/admin/lim-1');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingFeedback $trainingFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingFeedback $trainingFeedback)
    {
        return 'masuk';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingFeedbackRequest $request, TrainingFeedback $trainingFeedback)
    {
        return 'masuk';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingFeedback $trainingFeedback)
    {
        //
    }
}
