<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Undian;
use App\PesertaUndian;
use App\HadiahUndian;
use App\RiwayatUndian;
use App\Configuration;
use Storage;
use PDF;
use File;
use Excel;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['ip'] = getHostByName(getHostName());
        return view('menu')->with($data);
    }
    public function moderator()
    {
        return view('home');
    }
    public function data_undian()
    {
        $data['data'] = Undian::get();
        return view('data.undian.all')->with($data);
    }
    public function data_undian_edit($id)
    {
        $data['data'] = Undian::find($id);
        return view('data.undian.edit')->with($data);
    }
    public function data_undian_update(Request $r)
    {
        $id = $r->input('id');
        $data = Undian::find($id);
        $data->name = $r->input('name');
        $data->stops = $r->input('stops');
        $data->duration = $r->input('duration');
        $data->max_running = $r->input('max_running');
        $data->save();

        return redirect()->route('data_undian');
    }
    public function data_hadiah()
    {
        $data['data'] = HadiahUndian::get();
        return view('data.hadiah.all')->with($data);
    }
    public function data_hadiah_add()
    {
        $data['undian'] = Undian::get();
        return view('data.hadiah.add')->with($data);
    }
    public function data_hadiah_save(Request $r)
    {
        $data = new HadiahUndian;
        $data->id_undian = $r->input('id_undian');
        $data->hadiah = $r->input('hadiah');
        $data->active = 0;
        $data->save();

        return redirect()->route('data_hadiah');
    }
    public function data_hadiah_update(Request $r)
    {
        $id = $r->input('id');
        $data = HadiahUndian::find($id);
        $data->id_undian = $r->input('id_undian');
        $data->hadiah = $r->input('hadiah');
        $data->active = 0;
        $data->save();

        return redirect()->route('data_hadiah');
    }
    public function data_hadiah_delete($id)
    {
        $data = HadiahUndian::find($id);
        $data->delete();

        return redirect()->route('data_hadiah');
    }
    public function data_hadiah_edit($id)
    {
        $data['undian'] = Undian::get();
        $data['data'] = HadiahUndian::find($id);
        return view('data.hadiah.edit')->with($data);
    }
    public function data_peserta_undian()
    {
        $data['data'] = PesertaUndian::get();
        return view('data.peserta_undian.all')->with($data);
    }
    public function data_peserta_undian_add()
    {
        $data['undian'] = Undian::get();
        return view('data.peserta_undian.add')->with($data);
    }
    public function data_peserta_undian_import()
    {
        $data['undian'] = Undian::get();
        return view('data.peserta_undian.import')->with($data);
    }

    public function reset_data($id)
    {
        \App\RiwayatUndian::where('id_undian',$id)->delete();

        return redirect()->route('report');
    }
    public function data_peserta_undian_save_import(Request $r)
    {
        $reset_data = $r->has('reset_data');
        $reset_laporan = $r->has('reset_laporan');
        $id = $r->input('id_undian');
        $filename = date("YmdHis");
        $path = '';
        $query = '';
        if($r->file('excel_file')){
            $folder = "public/excel/";
            $file = $r->file('excel_file');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($folder."/".$filename.'.'.$extension,  File::get($file));
            $path = Storage::url("app/".$folder."/".$filename.'.'.$extension);
        }
        if($path!=""){
            Excel::load($path, function($reader) use ($id,$query,$reset_data,$reset_laporan) {
                $results = $reader->get();
                $query = 'INSERT INTO peserta_undians (id_undian,code,name,position,department,seat_number) values ';
                // dd($results);
                $i = 0;
                foreach ($results as $key) {
                    $i++;
                    $query .= "('".$id."',
                                '".str_replace("'", "\'", $key->code)."',
                                '".str_replace("'", "\'", $key->name)."',
                                '".str_replace("'", "\'", $key->position)."','','')";
                    if($i<sizeof($results)){
                        $query .= ",";
                    }
                }
                if($query!="" and $query != 'INSERT INTO peserta_undians (code,name,position) values '){
                    if($reset_data){
                        PesertaUndian::where('id_undian',$id)->delete();
                    }
                    if($reset_laporan){
                        RiwayatUndian::where('id_undian',$id)->delete();
                    }
                    $a = DB::insert($query);
                    // dd($a);
                }
                
            });
        }


        return redirect()->route('data_peserta_undian');
    }
    public function data_peserta_undian_edit($id)
    {
        $data['undian'] = Undian::get();
        $data['data'] = PesertaUndian::find($id);
        return view('data.peserta_undian.edit')->with($data);
    }
    public function data_peserta_undian_update(Request $r)
    {
        $id = $r->input('id');
        $data = PesertaUndian::find($id);
        $data->id_undian = $r->input('id_undian');
        $data->code = $r->input('code');
        $data->name = $r->input('name');
        $data->position = $r->input('position');
        $data->department = '';
        $data->seat_number = '';
        $data->save();

        return redirect()->route('data_peserta_undian');
    }
    public function set_win($id)
    {
        $data = RiwayatUndian::find($id);
        $data->status = "win";
        $data->save();

        return redirect()->route('report');
    }
    public function set_loss($id)
    {
        $data = RiwayatUndian::find($id);
        $data->status = "loss";
        $data->save();

        return redirect()->route('report');
    }
    public function data_peserta_undian_delete($id)
    {
        $data = PesertaUndian::find($id);
        $data->delete();
        
        return redirect()->route('data_peserta_undian');
    }
    public function report()
    {
        $data['data'] = Undian::get();
        return view('report.undian')->with($data);
    }
    public function pengaturan()
    {
        $data['data'] = Configuration::get();
        return view('configuration')->with($data);
    }
    public function pengaturan_save(Request $r)
    {
        $filename = date("YmdHis");
        $path = '';
        if($r->file('background_file')){
            $folder = "background";
            $file = $r->file('background_file');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($folder."/".$filename.'.'.$extension,  File::get($file));
            $path = url($folder."/".$filename.'.'.$extension);

            $config = Configuration::where('key','background')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'background';
            }
            $config->content = $path;
            $config->save();
        }
        $path = '';
        if($r->file('win_effect')){
            $folder = "audio";
            $file = $r->file('win_effect');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($folder."/".$filename.'.'.$extension,  File::get($file));
            $path = url($folder."/".$filename.'.'.$extension);

            $config = Configuration::where('key','win_effect')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'win_effect';
            }
            $config->content = $path;
            $config->save();
        }
        $path = '';
        if($r->file('loss_effect')){
            $folder = "audio";
            $file = $r->file('loss_effect');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($folder."/".$filename.'.'.$extension,  File::get($file));
            $path = url($folder."/".$filename.'.'.$extension);

            $config = Configuration::where('key','loss_effect')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'loss_effect';
            }
            $config->content = $path;
            $config->save();
        }
        $path = '';
        if($r->file('play_effect')){
            $folder = "audio";
            $file = $r->file('play_effect');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($folder."/".$filename.'.'.$extension,  File::get($file));
            $path = url($folder."/".$filename.'.'.$extension);

            $config = Configuration::where('key','play_effect')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'play_effect';
            }
            $config->content = $path;
            $config->save();
        }

        if($r->input('tanggal')!=""){
            $config = Configuration::where('key','tanggal')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'tanggal';
            }
            $config->content = date_format(date_create($r->input('tanggal')),"Y-m-d");
            $config->save();
        }
        if($r->input('tempat')!=""){
            $config = Configuration::where('key','tempat')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'tempat';
            }
            $config->content = $r->input('tempat');
            $config->save();
        }
        if($r->input('nama_event')!=""){
            $config = Configuration::where('key','nama_event')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'nama_event';
            }
            $config->content = $r->input('nama_event');
            $config->save();
        }else{
            $config = Configuration::where('key','nama_event')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'nama_event';
            }
            $config->content = '';
            $config->save();
        }

        if($r->input('ukuran_teks_nama_event')!=""){
            $config = Configuration::where('key','ukuran_teks_nama_event')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'ukuran_teks_nama_event';
            }
            $config->content = $r->input('ukuran_teks_nama_event');
            $config->save();
        }
        if($r->input('warna_teks_nama_event')!=""){
            $config = Configuration::where('key','warna_teks_nama_event')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_teks_nama_event';
            }
            $config->content = $r->input('warna_teks_nama_event');
            $config->save();
        }
        if($r->input('ukuran_teks_hadiah')!=""){
            $config = Configuration::where('key','ukuran_teks_hadiah')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'ukuran_teks_hadiah';
            }
            $config->content = $r->input('ukuran_teks_hadiah');
            $config->save();
        }
        if($r->input('warna_teks_hadiah')!=""){
            $config = Configuration::where('key','warna_teks_hadiah')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_teks_hadiah';
            }
            $config->content = $r->input('warna_teks_hadiah');
            $config->save();
        }
        if($r->input('ukuran_teks_nama_pemenang')!=""){
            $config = Configuration::where('key','ukuran_teks_nama_pemenang')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'ukuran_teks_nama_pemenang';
            }
            $config->content = $r->input('ukuran_teks_nama_pemenang');
            $config->save();
        }
        if($r->input('warna_teks_nama_pemenang')!=""){
            $config = Configuration::where('key','warna_teks_nama_pemenang')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_teks_nama_pemenang';
            }
            $config->content = $r->input('warna_teks_nama_pemenang');
            $config->save();
        }
        if($r->input('ukuran_teks_jabatan_pemenang')!=""){
            $config = Configuration::where('key','ukuran_teks_jabatan_pemenang')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'ukuran_teks_jabatan_pemenang';
            }
            $config->content = $r->input('ukuran_teks_jabatan_pemenang');
            $config->save();
        }
        if($r->input('warna_teks_jabatan_pemenang')!=""){
            $config = Configuration::where('key','warna_teks_jabatan_pemenang')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_teks_jabatan_pemenang';
            }
            $config->content = $r->input('warna_teks_jabatan_pemenang');
            $config->save();
        }
        if($r->input('ukuran_teks_nomor_undian')!=""){
            $config = Configuration::where('key','ukuran_teks_nomor_undian')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'ukuran_teks_nomor_undian';
            }
            $config->content = $r->input('ukuran_teks_nomor_undian');
            $config->save();
        }
        if($r->input('warna_teks_nomor_undian')!=""){
            $config = Configuration::where('key','warna_teks_nomor_undian')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_teks_nomor_undian';
            }
            $config->content = $r->input('warna_teks_nomor_undian');
            $config->save();
        }
        if($r->input('warna_background_nomor_undian')!=""){
            $config = Configuration::where('key','warna_background_nomor_undian')->first();
            if(!isset($config->content)){
                $config = new Configuration;
                $config->key = 'warna_background_nomor_undian';
            }
            $config->content = $r->input('warna_background_nomor_undian');
            $config->save();
        }

        
        return redirect()->route('pengaturan');
    }
    public function report_export($id=0)
    {
        $pdf = null;
        $data = [];
        if($id==0){
            $data['data'] = Undian::get();
        }else{
            $data['data'] = Undian::where('id',$id)->get();
        }
        $pdf = PDF::loadView('report.undian_pdf', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('laporan.pdf');
    }

}
