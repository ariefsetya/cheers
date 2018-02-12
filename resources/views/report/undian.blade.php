@extends('layouts.app')

@section('content')
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="{{route('home')}}">
        <i class="large material-icons">home</i>
    </a>
</div>
<div class="container">
	<h2>Laporan Undian</h2>
	@foreach($data as $key)
	<div class="right">
		<a href="{{route('reset_data',[$key->id])}}" onclick="return confirm('Apakah Anda yakin ingin mereset semua data riwayat Undian?')" class="btn btn-large">Reset</a>
	</div>
	<h4><b>{{$key->name}}</b> <small><a target="_blank" href="{{route('report_export',$key->id)}}">Export PDF</a></small></h4>

	<label>Event : {{isset(\App\Configuration::where('key','nama_event')->first()->content)?\App\Configuration::where('key','nama_event')->first()->content:$key->name}}</label><br>
	<label>Tanggal Undian : {{isset(\App\Configuration::where('key','tanggal')->first()->content)?date_format(date_create(\App\Configuration::where('key','tanggal')->first()->content),"d M Y"):''}}</label>
	<br><label>Tempat Undian : {{isset(\App\Configuration::where('key','tanggal')->first()->content)?\App\Configuration::where('key','tempat')->first()->content:''}}</label>
	<br>
	<br>
	<div class="divider" style="clear: both;"></div>
	<div class="row">
		@foreach(\App\HadiahUndian::get() as $kay)
		<div class="col s5 m5">
			<center><b>Undian Menang {{$kay->hadiah}}</b></center>
			<ol class="collection">
				@foreach(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','win')->get() as $kuy)
		      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}<br><a href="{{route('set_loss',[$kuy->id])}}">Set Loss</a></li>
		      	@endforeach
		    </ol>
		    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','win')->get())==0)
		    	<ul class="collection">
		    		<li class="collection-item">Tidak ada data</li>
		    	</ul>
		    @endif
		</div>
		<div class="col s5 m5">
			<center><b>Undian Hangus {{$kay->hadiah}}</b></center>
			<ol class="collection">
				@foreach(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','loss')->get() as $kuy)
		      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}<br><a href="{{route('set_win',[$kuy->id])}}">Set Win</a></li>
		      	@endforeach
		    </ol>
		    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','loss')->get())==0)
		    	<ul class="collection">
		    		<li class="collection-item">Tidak ada data</li>
		    	</ul>
		    @endif
		</div>
		<div class="divider" style="clear: both;"></div>
		<br>
		@endforeach
		@if(sizeof(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->whereIn('status',['win','loss'])->get())>0)
			<div class="col s5 m5">
				<center><b>Undian Menang</b></center>
				<ol class="collection">
					@foreach(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','win')->get() as $kuy)
			      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}<br><a href="{{route('set_loss',[$kuy->id])}}">Set Loss</a></li>
			      	@endforeach
			    </ol>
			    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','win')->get())==0)
			    	<ul class="collection">
			    		<li class="collection-item">Tidak ada data</li>
			    	</ul>
			    @endif
			</div>
			<div class="col s5 m5">
				<center><b>Undian Hangus</b></center>
				<ol class="collection">
					@foreach(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','loss')->get() as $kuy)
			      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}<br><a href="{{route('set_win',[$kuy->id])}}">Set Win</a></li>
			      	@endforeach
			    </ol>
			    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','loss')->get())==0)
			    	<ul class="collection">
			    		<li class="collection-item">Tidak ada data</li>
			    	</ul>
			    @endif
			</div>
			<div class="divider" style="clear: both;"></div>
			<br>
		@endif
	</div>
	@endforeach

</div>

@endsection