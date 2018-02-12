<!DOCTYPE html>
<html>
<head>
	<title>Laporan Undian</title>
</head>
<body>
	<style>
	.page-break {
	    page-break-after: always;
	}
	*{
		font-family: 'sans-serif';
	}
	</style>
	<div>
		<div>
		<h2>Laporan Undian</h2>
		@foreach($data as $key)
		<h3><b>{{$key->name}}</b></h3>
		<label>Event : {{isset(\App\Configuration::where('key','nama_event')->first()->content)?\App\Configuration::where('key','nama_event')->first()->content:$key->name}}</label><br>
		<label>Tanggal Undian : {{isset(\App\Configuration::where('key','tanggal')->first()->content)?date_format(date_create(\App\Configuration::where('key','tanggal')->first()->content),"d M Y"):''}}</label>
		<br>
		<label>Tempat Undian : {{isset(\App\Configuration::where('key','tanggal')->first()->content)?\App\Configuration::where('key','tempat')->first()->content:''}}</label>
		<br>
		<br>
		</div>
		<div class="row">
			@foreach(\App\HadiahUndian::get() as $kay)
			<div class="col s5 m5">
				<b>Undian Menang {{$kay->hadiah}}</b>
				<ol class="collection">
					@foreach(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','win')->get() as $kuy)
			      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}</li>
			      	@endforeach
			    </ol>
			    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','win')->get())==0)
			    	<ul class="collection">
			    		<li class="collection-item">Tidak ada data</li>
			    	</ul>
			    @endif
			</div>
			<div class="col s5 m5">
				<b>Undian Hangus {{$kay->hadiah}}</b>
				<ol class="collection">
					@foreach(\App\RiwayatUndian::where('id_hadiah',$kay->id)->where('id_undian',$key->id)->where('status','loss')->get() as $kuy)
			      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}</li>
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
					<b>Undian Menang</b>
					<ol class="collection">
						@foreach(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','win')->get() as $kuy)
				      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}</li>
				      	@endforeach
				    </ol>
				    @if(sizeof(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','win')->get())==0)
				    	<ul class="collection">
				    		<li class="collection-item">Tidak ada data</li>
				    	</ul>
				    @endif
				</div>
				<div class="col s5 m5">
					<b>Undian Hangus</b>
					<ol class="collection">
						@foreach(\App\RiwayatUndian::where('id_hadiah',0)->where('id_undian',$key->id)->where('status','loss')->get() as $kuy)
				      		<li class="collection-item">{!!"<b>".\App\PesertaUndian::find($kuy->id_peserta)->name."</b><br>".\App\PesertaUndian::find($kuy->id_peserta)->position!!}</li>
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

</body>
</html>