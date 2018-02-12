@extends('layouts.app')

@section('content')
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('data_peserta_undian')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
  <h2>Edit Data Peserta Undian {{$data->name}}</h2>
  <div class="row">
    <form class="col s12" method="POST" action="{{route('data_peserta_undian_update')}}">
      <input type="hidden" name="id" value="{{$data->id}}">
      {{csrf_field()}}
      <div class="row">
        <div class="input-field col s12">
          <select id="id_undian" type="text" name="id_undian">
            @foreach($undian as $key)
              <option {{$data->id_undian==$key->id?'selected':''}} value="{{$key->id}}">{{$key->name}}</option>
            @endforeach
          </select>
          <label for="id_undian">Undian</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="code" type="text" name="code" value="{{$data->code}}">
          <label for="code">Code ID</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" name="name" value="{{$data->name}}">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="position" type="text" name="position" value="{{$data->position}}">
          <label for="position">Position</label>
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
  });
</script>
@endsection