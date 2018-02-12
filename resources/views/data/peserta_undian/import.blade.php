@extends('layouts.app')

@section('content')


<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('data_peserta_undian')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
  <h2>Import Data Peserta Undian</h2>
  <div class="row">
    <form class="col s12" method="POST" action="{{route('data_peserta_undian_save_import')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="row">
        <p><a href="{{url('excel/sample_excel.xlsx')}}">Click here</a> to download sample excel</p>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select id="id_undian" type="text" name="id_undian">
            @foreach($undian as $key)
              <option value="{{$key->id}}">{{$key->name}}</option>
            @endforeach
          </select>
          <label for="id_undian">Undian</label>
        </div>
      </div>
      <div class="row">
        <div class="file-field input-field">
  	      <div class="btn">
  	        <span>File</span>
  	        <input type="file" name="excel_file">
  	      </div>
  	      <div class="file-path-wrapper">
  	        <input class="file-path validate" type="text">
  	      </div>
  	    </div>
      </div>
      <div class="row">
      	<input type="checkbox" id="reset_data" name="reset_data" />
      	<label for="reset_data">Reset Data Peserta</label>
      </div>
      <div class="row">
      	<input type="checkbox" id="reset_laporan" name="reset_laporan" />
      	<label for="reset_laporan">Reset Laporan</label>
      </div>
      <div class="row">
        <div class="right-align">
          <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">send</i> Import</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection