@extends('layouts.app')

@section('title', 'Kategori Produk - Majoo Indonesia')

@section('panel-heading', 'Kategori Produk')

@section('css')
<link href="{{ asset('css/select2.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
@endsection

@section('content')

<!-- <div class="container"> -->
	<div class="row" style="padding: 2em;">
		@if (count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="alert alert-danger alert-styled-right alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
		            {{ $error }}
		        </div>
			@endforeach
		@endif
	    <!-- ./notifikasi -->

		@if (isset($data))
            {!! Form::model($data, ['route' => ['produk.simpan'], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'produkform']) !!}
            {!! Form::hidden('id', null) !!}
        @else
            {!! Form::open(['url' => route('produk.simpan'), 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'id' => 'produkform']) !!}
        @endif
			<div class="form-group row">
		        <label class="col-form-label col-lg-2">Nama</label>
		        <div class="col-lg-10">
		            {!! Form::text('nama', null, ['class'=>'form-control', 'id'=>'nama']) !!}
		        </div>
		    </div>

		    <div class="form-group row">
		        <label class="col-form-label col-lg-2">Deskripsi</label>
		        <div class="col-lg-10">
		            {!! Form::textarea('deskripsi', null, ['class'=>'form-control summernote', 'id'=>'deskripsi']) !!}
		        </div>
		    </div>

		    <div class="form-group row">
		        <label class="col-form-label col-lg-2">Harga</label>
		        <div class="col-lg-10">
		            {!! Form::number('harga', null, ['class'=>'form-control', 'id'=>'harga']) !!}
		        </div>
		    </div>

		    <div class="form-group row">
		        <label class="col-form-label col-lg-2">Kategori</label>
		        <div class="col-lg-10">
		            {!! Form::select("kategori_id", $kategori, null, ['class'=>'form-control select2', 'style'=>'width:100%']) !!}
		        </div>
		    </div>

		    @if (isset($data))
		    	<img src="{{ asset('storage/produk_img/'.$data->gambar) }}">
		    @endif
		    <div class="form-group row">
		        <label class="col-form-label col-lg-2">Gambar</label>
		        <div class="col-lg-10">
		            {!! Form::file("gambar", ['class'=>'form-control', 'id' => 'gambar']) !!}
		        </div>
		    </div>
		    <!-- Progress bar -->
			<div class="progress">
			    <div class="progress-bar"></div>
			</div>
			<!-- Display upload status -->
			<div id="uploadStatus"></div>

		    <div class="form-group row">
		    	<div class="col-lg-12 text-right">
		    		<button type="submit" class="btn btn-primary">Simpan</button> 
                    <a href="{{route('produk.index')}}">
                        <button type="button" class="btn btn-light legitRipple">Kembali</button>
                    </a>
		    	</div>
		    </div>
		</form>
	</div>
<!-- </div> -->
@endsection

@section('js')
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$(".select2").select2();

		$('.summernote').summernote();

		$("#produkform").submit(function(event) {
			console.log('test submit');
		});
	});
</script>
@endsection