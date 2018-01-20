<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Undian;
use App\PesertaUndian;
use App\RiwayatUndian;
use DB;

class AjaxController extends Controller
{
    public function ajaxGetUndian()
    {
    	$active = Undian::where('status',2)->first();
    	$data['data'] = $active;
    	return response()->json($data);
    }
    public function ajaxGetPesertaUndian($id)
    {
        $riwayat = RiwayatUndian::select('id_peserta')->where('id_undian',$id)->get();
        $data_riwayat = [];
        foreach ($riwayat as $key) {
            $data_riwayat[] = $key->id_peserta;
        }
        if(sizeof($riwayat)==0){
            $riwayat = 0;
        }
    	$peserta = PesertaUndian::where('id_undian',$id)->whereNotIn('id',$data_riwayat)->orderBy(DB::Raw('RAND()'))->get();
    	$data['data'] = $peserta;
    	return response()->json($data);
    }
    public function ajaxGetRunningStatus($id)
    {
    	$undian = Undian::find($id);
    	$data['data'] = $undian->running_status;
    	return response()->json($data);
    }
    public function ajaxStopRunningUndian($id,$id_peserta)
    {
    	$undian = Undian::find($id);
    	$undian->running_status=3;
    	$undian->save();

    	$ru = new RiwayatUndian;
        $ru->id_undian = $id;
    	$ru->id_peserta = $id_peserta;
    	$ru->status = '';
    	$ru->save();

    	$data['data'] = 'done';
    	return response()->json($data);
    }
    public function ajaxGetDataUndian()
    {
    	$undian = Undian::get();
    	$data['data'] = $undian;
    	return response()->json($data);
    }
    public function ajaxStartUndian($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 2;
    	$undian->save();
    	$data['data'] = $undian;
    	return response()->json($data);
    }
    public function ajaxStopUndian($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 3;
    	$undian->save();
    	$data['data'] = $undian;
    	return response()->json($data);
    }
    public function ajaxWin($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 1;
    	$undian->save();

    	$ru = RiwayatUndian::orderBy('id','desc')->first();
    	$ru->status = "win";
    	$ru->save();

    	$data['data'] = $undian;
    	return response()->json($data);
    }
    public function ajaxLoss($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 1;
    	$undian->save();

    	$ru = RiwayatUndian::orderBy('id','desc')->first();
    	$ru->status = "loss";
    	$ru->save();

    	$data['data'] = $undian;
    	return response()->json($data);
    }
}
