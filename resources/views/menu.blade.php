@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <a href="{{route('data_undian')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://i.pinimg.com/originals/75/41/fd/7541fda5003cd1b6165dc3129a6ce048.png">
            <span class="card-title">Data Undian</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Pengelola Undian</p>
          </div>
        </div>
      </div>
    </a>
    <a href="{{route('undian')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://cdn.dribbble.com/users/80428/screenshots/2881091/twitter_camera.png">
            <span class="card-title">Undian</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Mulai Undian</p>
          </div>
        </div>
      </div>
    </a>
    <a href="{{route('report')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://i.pinimg.com/originals/21/fd/a5/21fda5b6ce01c5af0a49cd9a0e11b3cb.png">
            <span class="card-title">Laporan</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Laporan Undian</p>
          </div>
        </div>
      </div>
    </a>
    <a href="{{route('moderator')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://cdn.dribbble.com/users/123004/screenshots/3921388/hands_ddd.jpg">
            <span class="card-title">Moderator</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Moderator Undian</p>
          </div>
        </div>
      </div>
    </a>
    <a href="{{route('pengaturan')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://cdn.dribbble.com/users/129980/screenshots/1384301/equalizzatore.png">
            <span class="card-title">Pengaturan</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Pengaturan Aplikasi</p>
          </div>
        </div>
      </div>
    </a>
    <a href="{{route('logout')}}">
      <div class="col s12 m4">
        <div class="card">
          <div class="card-image">
            <img src="https://thumbs.dreamstime.com/b/open-door-flat-icon-long-shadow-vector-illustration-82546748.jpg">
            <span class="card-title">Sign Out</span>
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">send</i></a>
          </div>
          <div class="card-content">
            <p>Keluar dari account {{Auth::user()->name}}</p>
          </div>
        </div>
      </div>
    </a>
  </div>
         
@endsection