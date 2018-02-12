@extends('layouts.app')

@section('content')
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('data_undian')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
  <h2>Edit Data Undian {{$data->name}}</h2>
  <div class="row">
    <form class="col s12" method="POST" action="{{route('data_undian_update')}}">
      <input type="hidden" name="id" value="{{$data->id}}">
      {{csrf_field()}}
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" name="name" value="{{$data->name}}">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select id="stops" type="text" name="stops">
            <option {{$data->stops=='manual'?'selected':''}} value="manual">Manual</option>
            <option {{$data->stops=='auto'?'selected':''}} value="auto">Auto</option>
          </select>
          <label for="stops">Stops</label>
        </div>
      </div>
      <div class="row" id="duration_layout" style="display:{{$data->stops=='manual'?'none':'block'}}">
        <div class="input-field col s12">
          <input id="duration" type="text" name="duration" value="{{$data->duration}}">
          <label for="duration">Duration (s)</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="max_running" type="text" name="max_running" value="{{$data->max_running}}">
          <label for="max_running">Max Running (times)</label>
        </div>
      </div>
      <div class="row">
        <div class="right-align">
          <button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">save</i>Update</button>
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
    $("#stops").on('change',function() {
      if($("#stops").val()=="auto"){
        $("#duration_layout").show();
      }else{
        $("#duration_layout").hide();
      }
    });
  });
</script>
@endsection