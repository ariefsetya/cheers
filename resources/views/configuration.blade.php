@extends('layouts.app')

@section('content')
<style type="text/css">
  .colorpicker-2x .colorpicker-saturation {
    width: 200px;
    height: 200px;
  }
  .colorpicker-2x .colorpicker-hue,
  .colorpicker-2x .colorpicker-alpha {
    width: 30px;
    height: 200px;
  }
  .colorpicker-2x .colorpicker-color,
  .colorpicker-2x .colorpicker-color div{
    height: 30px;
  }
</style>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('home')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
  <h2>Pengaturan</h2>
  <div class="row">
    <form class="col s12" method="POST" action="{{route('pengaturan_save')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="row">
        <img style="width:100px;" src="{{isset(\App\Configuration::where('key','background')->first()->content)?\App\Configuration::where('key','background')->first()->content:''}}">
        <div class="file-field input-field">
          <div class="btn">
            <span>Background Undian</span>
            <input type="file" name="background_file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <label>Efek Suara Menang : {{isset(\App\Configuration::where('key','win_effect')->first()->content)?\App\Configuration::where('key','win_effect')->first()->content:''}}</label>
        <div class="file-field input-field">
          <div class="btn">
            <span>Efek Suara Menang</span>
            <input type="file" name="win_effect">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <label>Efek Suara Hangus : {{isset(\App\Configuration::where('key','loss_effect')->first()->content)?\App\Configuration::where('key','loss_effect')->first()->content:''}}</label>
        <div class="file-field input-field">
          <div class="btn">
            <span>Efek Suara Hangus</span>
            <input type="file" name="loss_effect">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <label>Efek Suara Undian : {{isset(\App\Configuration::where('key','play_effect')->first()->content)?\App\Configuration::where('key','play_effect')->first()->content:''}}</label>
        <div class="file-field input-field">
          <div class="btn">
            <span>Efek Suara Undian</span>
            <input type="file" name="play_effect">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>

      <div class="row">
        <label for="nama_event">Nama Event</label>
        <input type="text" name="nama_event" id="nama_event" value="{{isset(\App\Configuration::where('key','nama_event')->first()->content)?\App\Configuration::where('key','nama_event')->first()->content:''}}" />
      </div>
      <div class="row">
        <label for="tanggal">Tanggal Undian : {{isset(\App\Configuration::where('key','tanggal')->first()->content)?\App\Configuration::where('key','tanggal')->first()->content:''}}</label>
        <input type="text" name="tanggal" class="datepicker">
      </div>
      <div class="row">
        <label for="tempat">Tempat Undian</label>
        <textarea type="text" name="tempat" id="tempat" class="materialize-textarea">{{isset(\App\Configuration::where('key','tempat')->first()->content)?\App\Configuration::where('key','tempat')->first()->content:''}}</textarea>
      </div>

      <div class="row">
        <div class="col m4">
        <label for="warna_background_nomor_undian">Warna Background Nomor Undian</label>
        <input class="color-picker" type="text" name="warna_background_nomor_undian" id="warna_background_nomor_undian" value="{{isset(\App\Configuration::where('key','warna_background_nomor_undian')->first()->content)?\App\Configuration::where('key','warna_background_nomor_undian')->first()->content:'#ffffff'}}" />
      </div>
        <div class="col m4">
        <label for="warna_teks_nomor_undian">Warna Teks Nomor Undian</label>
        <input class="color-picker" type="text" name="warna_teks_nomor_undian" id="warna_teks_nomor_undian" value="{{isset(\App\Configuration::where('key','warna_teks_nomor_undian')->first()->content)?\App\Configuration::where('key','warna_teks_nomor_undian')->first()->content:'#000000'}}" />
      </div>
        <div class="col m4">
        <label for="ukuran_teks_nomor_undian">Ukuran Teks Nomor Undian</label>
        <input type="number" name="ukuran_teks_nomor_undian" id="ukuran_teks_nomor_undian" value="{{isset(\App\Configuration::where('key','ukuran_teks_nomor_undian')->first()->content)?\App\Configuration::where('key','ukuran_teks_nomor_undian')->first()->content:'100'}}" />
      </div>
      </div>

      <div class="row">
        <div class="col m6">
        <label for="warna_teks_nama_event">Warna Teks Nama Event</label>
        <input class="color-picker" type="text" name="warna_teks_nama_event" id="warna_teks_nama_event" value="{{isset(\App\Configuration::where('key','warna_teks_nama_event')->first()->content)?\App\Configuration::where('key','warna_teks_nama_event')->first()->content:'#ffffff'}}" />
      </div>
        <div class="col m6">
        <label for="ukuran_teks_nama_event">Ukuran Teks Nama Event</label>
        <input type="number" name="ukuran_teks_nama_event" id="ukuran_teks_nama_event" value="{{isset(\App\Configuration::where('key','ukuran_teks_nama_event')->first()->content)?\App\Configuration::where('key','ukuran_teks_nama_event')->first()->content:'60'}}" />
      </div>
      </div>
      <div class="row">
        <div class="col m6">
        <label for="warna_teks_hadiah">Warna Teks Hadiah</label>
        <input class="color-picker" type="text" name="warna_teks_hadiah" id="warna_teks_hadiah" value="{{isset(\App\Configuration::where('key','warna_teks_hadiah')->first()->content)?\App\Configuration::where('key','warna_teks_hadiah')->first()->content:'#00ffff'}}" />
      </div>
        <div class="col m6">
        <label for="ukuran_teks_hadiah">Ukuran Teks Hadiah</label>
        <input type="number" name="ukuran_teks_hadiah" id="ukuran_teks_hadiah" value="{{isset(\App\Configuration::where('key','ukuran_teks_hadiah')->first()->content)?\App\Configuration::where('key','ukuran_teks_hadiah')->first()->content:'30'}}" />
      </div>
      </div>
      <div class="row">
        <div class="col m6">
        <label for="warna_teks_nama_pemenang">Warna Teks Nama Pemenang</label>
        <input class="color-picker" type="text" name="warna_teks_nama_pemenang" id="warna_teks_nama_pemenang" value="{{isset(\App\Configuration::where('key','warna_teks_nama_pemenang')->first()->content)?\App\Configuration::where('key','warna_teks_nama_pemenang')->first()->content:'#ffffff'}}" />
      </div>
        <div class="col m6">
        <label for="ukuran_teks_nama_pemenang">Ukuran Teks Nama Pemenang</label>
        <input type="number" name="ukuran_teks_nama_pemenang" id="ukuran_teks_nama_pemenang" value="{{isset(\App\Configuration::where('key','ukuran_teks_nama_pemenang')->first()->content)?\App\Configuration::where('key','ukuran_teks_nama_pemenang')->first()->content:'50'}}" />
      </div>
      </div>
      <div class="row">
        <div class="col m6">
        <label for="warna_teks_jabatan_pemenang">Warna Teks Jabatan Pemenang</label>
        <input class="color-picker" type="text" name="warna_teks_jabatan_pemenang" id="warna_teks_jabatan_pemenang" value="{{isset(\App\Configuration::where('key','warna_teks_jabatan_pemenang')->first()->content)?\App\Configuration::where('key','warna_teks_jabatan_pemenang')->first()->content:'#ffe269'}}" />
      </div>
        <div class="col m6">
        <label for="ukuran_teks_jabatan_pemenang">Ukuran Teks Jabatan Pemenang</label>
        <input type="number" name="ukuran_teks_jabatan_pemenang" id="ukuran_teks_jabatan_pemenang" value="{{isset(\App\Configuration::where('key','ukuran_teks_jabatan_pemenang')->first()->content)?\App\Configuration::where('key','ukuran_teks_jabatan_pemenang')->first()->content:'30'}}" />
      </div>
      </div>
      <div class="row">
        <div class="right-align">
          <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">save</i>Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false
  }); 
  $(function(){
    $('.color-picker').colorpicker({
      customClass: 'colorpicker-2x',
      sliders: {
        saturation: {
          maxLeft: 200,
          maxTop: 200
        },
        hue: {
          maxTop: 200
        },
        alpha: {
          maxTop: 200
        }
      }
    });
  });
</script>
@endsection