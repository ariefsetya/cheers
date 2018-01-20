<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Undian;
use App\PesertaUndian;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('menu');
    }
    public function moderator()
    {
        return view('home');
    }
    public function data_undian()
    {
        $data['data'] = Undian::all();
        return view('data.undian.all')->with($data);
    }
    public function data_peserta_undian()
    {
        $data['data'] = PesertaUndian::all();
        return view('data.peserta_undian.all')->with($data);
    }
}
