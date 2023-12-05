<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helper;
use App\Models\TrainingEvaluation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTrainingEvaluationRequest;
use App\Http\Requests\UpdateTrainingEvaluationRequest;

class TrainingEvaluationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingEvaluationRequest $request)
    {
        // var_dump((new helper)->training_evaluation_keterangan(100, 40));die;
        
        $request->validate([
            'nama_pelatihan' => 'required',
            'region' => 'required',
            'witel' => 'required',
            'tgl_mulai_pelaksanaan' => 'required',
            'tgl_selesai_pelaksanaan' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ],[
            'required' => 'Field :attribute tidak boleh kosong',
        ]);        

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
                    array_push($rawdata, [$request->bulan, $request->tahun, $request->region, $request->witel, $request->nama_pelatihan, $request->tgl_mulai_pelaksanaan, $request->tgl_selesai_pelaksanaan, $open[0], $open[1], $open[2], $open[3], $open[4], $open[5]]);
                }
            }

            fclose($file);
        }
        
        unset($rawdata[0]);

        DB::table('training_evaluations')->where([['bulan_pelaksanaan', $request->bulan], ['tahun_pelaksanaan', $request->tahun]])->delete();

        foreach($rawdata as $rd){
            TrainingEvaluation::create([
                'bulan_pelaksanaan' => $rd[0],
                'tahun_pelaksanaan' => $rd[1],
                'regional' => $rd[2],
                'nama_pelatihan' => $rd[3],
                'witel' => $rd[4],
                'tgl_mulai_pelaksanaan' => $rd[5] == ''? null : $rd[5],
                'tgl_selesai_pelaksanaan' => $rd[6] == ''? null : $rd[6],
                'nik' => $rd[7],
                'nama' => $rd[8],
                'nama_instruktur' => $rd[9],
                'kehadiran' => $rd[10],
                'nilai_pre_test' => (float)$rd[11],
                'nilai_post_test' => (float)$rd[12],
                'keterangan' => (new helper)->training_evaluation_keterangan($rd[12], $rd[11]),
                'peningkatan_belajar' => ((int)$rd[12] - (int)$rd[11]) / (int)$rd[11] * 100,
            ]);
        }        

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingEvaluation $trainingEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingEvaluation $trainingEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingEvaluationRequest $request, TrainingEvaluation $trainingEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingEvaluation $trainingEvaluation)
    {
        //
    }
}
