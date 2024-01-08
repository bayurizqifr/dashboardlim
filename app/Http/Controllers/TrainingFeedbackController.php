<?php

namespace App\Http\Controllers;

use App\Models\TrainingFeedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        return 'masuk';
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
        $request->validate([
            'nama_pelatihan' => 'required',
            'region' => 'required',
            'witel' => 'required',
            'tgl_mulai_training' => 'required',
            'tgl_akhir_training' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ],[
            'required' => 'Field :attribute tidak boleh kosong',
        ]); 
        
        $rawdata = [];
        if($request->csv->extension() !== 'txt'){
            session()->flash('csv-gagal', 'File CSV tidak dapat dibaca');
            return redirect('/admin/lim-1');
        }else{
            $data = $request->csv->path();
            $file = fopen($data,"r");

            while(! feof($file)){
                $open = fgetcsv($file);

                if($open !== false){
                    $open = explode(';',$open[0]);
                    array_push($rawdata, [$request->bulan, $request->tahun, $open[0], $open[1], $open[2], $request->nama_pelatihan, $request->tgl_mulai_training, $request->tgl_akhir_training, $request->region, $request->witel, $open[3], $open[4], $open[5], $open[6], $open[7], $open[8], $open[9], $open[10], $open[11], $open[12], $open[13], $open[14], $open[15]]);
                }
            }

            fclose($file);
        }

        unset($rawdata[0]);

        // DB::table('training_feedback')->where([['bulan_pelaksanaan', $request->bulan], ['tahun_pelaksanaan', $request->tahun]])->delete();

        foreach($rawdata as $rd){
            TrainingFeedback::create([
                'bulan_pelaksanaan' => $rd[0],
                'tahun_pelaksanaan' => $rd[1],
                'nik' => $rd[2],
                'nama_lengkap' => $rd[3],
                'nama_perusahaan' => $rd[4],
                'nama_pelatihan' => $rd[5],
                'tgl_mulai_training' => $rd[6],
                'tgl_akhir_training' => $rd[7],
                'regional_penyelenggara' => $rd[8],
                'witel_penyelenggara' => $rd[9],
                'feedback_rencana' => $rd[10],
                'feedback_saran' => $rd[11],
                'feedback_support_1' => $rd[12],
                'feedback_support_2' => $rd[13],
                'feedback_support_3' => $rd[14],
                'feedback_facilitator_1' => $rd[15],
                'feedback_facilitator_2' => $rd[16],
                'feedback_facilitator_3' => $rd[17],
                'feedback_facilities_1' => $rd[18],
                'feedback_facilities_2' => $rd[19],
                'feedback_facilities_3' => $rd[20],
                'feedback_manfaat' => $rd[21],
                'feedback_antusias' => $rd[22],
            ]);
        }        

        session()->flash('status-sukses', 'data berhasil ditambahkan');
        return redirect('/admin/lim-1');     
    }

    /**
     * Display the specified resource.
     */
    
    //  Show Data LIM 1
    public function show_lim1()
    {
        $show_lim1 = DB::table('training_feedback')->get();

        $lim1 = [];
        foreach($show_lim1 as $row){
            $data_lim1 = DB::table('training_feedback');

            array_push($lim1, [

                'id' => $row->id,
                'nik' => $row->nik,
                'nama_lengkap' => $row->nama_lengkap,
                'nama_pelatihan' => $row->nama_pelatihan,
                'regional' => $row->regional_penyelenggara,
                'witel' => $row->witel_penyelenggara
            ]);
        }

        // echo ('<pre>');
        // var_dump($lim1); die;

       //Untuk menampilkan database
         $data_lim1 = DB::table('training_feedback')
                ->select('nama_pelatihan')
                ->distinct()
                ->get();

         $data = [
           'data_lim1' => $data_lim1,
           'show_lim1' => $show_lim1
         ];
 
           return view('pages.lim1', $data);
    }

    
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
    public function destroy($id,Request $request, TrainingFeedback $trainingFeedback)
    {
        // echo'<pre>';var_dump($id);die;
        DB::table('training_feedback')->where([['id', $id]])->delete();

        session()->flash('status-sukses', 'data berhasil dihapus');
        return redirect('/admin/lim-1?b='.$request->b.'&t='.$request->t);
    }
}