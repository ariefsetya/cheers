@extends('layouts.app')

@section('content')
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('data_hadiah')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
  <h2>Tambah Data Hadiah Undian</h2>
  <div class="row">
    <form class="col s12" method="POST" action="{{route('data_hadiah_save')}}">
      {{csrf_field()}}
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
        <div class="input-field col s12">
          <input id="hadiah" type="text" name="hadiah">
          <label for="hadiah">Hadiah</label>
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
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection