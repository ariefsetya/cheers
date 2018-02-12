<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Undian;
use App\PesertaUndian;
use App\RiwayatUndian;
use App\HadiahUndian;
use DB;

class AjaxController extends Controller
{
    public function ajaxGetUndian()
    {
    	$active = Undian::where('status',2)->first();
        $active->name = isset(\App\Configuration::where('key','nama_event')->first()->content)?\App\Configuration::where('key','nama_event')->first()->content:$active->name;
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
        $hadiah = HadiahUndian::where('active',1)->first();
        if($hadiah==null){
            $hadiah = ['hadiah'=>'&nbsp;','id'=>0];
        }
        $data['hadiah'] = $hadiah;
        $data['last_history'] = '';
        if(isset(RiwayatUndian::orderBy('id','desc')->first()->status)){
            $data['last_history'] = RiwayatUndian::orderBy('id','desc')->first()->status;
        }
    	return response()->json($data);
    }
    public function ajaxStopRunningUndian($id,$id_peserta)
    {
    	$undian = Undian::find($id);
    	$undian->running_status=3;
    	$undian->save();

        if(sizeof(RiwayatUndian::get())>0){
            if(RiwayatUndian::orderBy('id','desc')->first()->status!=""
                ){
                $ru = new RiwayatUndian;
                $ru->id_undian = $id;
                $ru->id_peserta = $id_peserta;
                $ru->id_hadiah = 0;
                $ru->status = '';
                $ru->save();
            }
        }else{
            $ru = new RiwayatUndian;
            $ru->id_undian = $id;
            $ru->id_peserta = $id_peserta;
            $ru->id_hadiah = 0;
            $ru->status = '';
            $ru->save();
        }

    	$data['data'] = 'done';
    	return response()->json($data);
    }
    public function ajaxGetDataUndian()
    {
    	$undian = Undian::where('status',2)->get();
        $data['data'] = $undian;
    	$data['hadiah'] = HadiahUndian::where('id_undian',$undian[0]->id)->get();
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
    public function ajaxActivateHadiah($id,$id_undian)
    {
        $deactivate = HadiahUndian::where('id_undian',$id_undian)->get();
        foreach ($deactivate as $key) {
            $deact = HadiahUndian::find($key->id);
            $deact->active = 0;
            $deact->save();
        }

    	$undian = HadiahUndian::find($id);
    	$undian->active = 1;
    	$undian->save();
    	
        $data['data'] = $undian;
    	
        return response()->json($data);
    }
    public function ajaxWin($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 4;
    	$undian->save();

    	$ru = RiwayatUndian::orderBy('id','desc')->first();
        $ru->status = "win";
    	$ru->id_hadiah = isset(HadiahUndian::where('active',1)->first()->id)?HadiahUndian::where('active',1)->first()->id:0;
    	$ru->save();

    	$data['data'] = $undian;
    	return response()->json($data);
    }
    public function ajaxLoss($id)
    {
        $undian = Undian::find($id);
        $undian->running_status = 4;
        $undian->save();

        $ru = RiwayatUndian::orderBy('id','desc')->first();
        $ru->status = "loss";
        $ru->id_hadiah = isset(HadiahUndian::where('active',1)->first()->id)?HadiahUndian::where('active',1)->first()->id:0;
        $ru->save();

        $data['data'] = $undian;
        return response()->json($data);
    }
    public function ajaxReset($id)
    {
        $undian = Undian::find($id);
        $undian->running_status = 6;
        $undian->save();

        $data['data'] = $undian;
        return response()->json($data);
    }
    public function ajaxResetToReset($id)
    {
        $undian = Undian::find($id);
        $undian->running_status = 5;
        $undian->save();

        $data['data'] = $undian;
        return response()->json($data);
    }
    public function ajaxResetToIdle($id)
    {
    	$undian = Undian::find($id);
    	$undian->running_status = 1;
    	$undian->save();

    	$data['data'] = $undian;
    	return response()->json($data);
    }
}
