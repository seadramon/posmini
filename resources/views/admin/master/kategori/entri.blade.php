@extends('layouts.app')

@section('title', 'Kategori Produk - Majoo Indonesia')

@section('panel-heading', 'Kategori Produk')

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
            {!! Form::model($data, ['route' => ['master.kategori-simpan'], 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('id', null) !!}
        @else
            {!! Form::open(['url' => route('master.kategori-simpan'), 'class' => 'form-horizontal']) !!}
        @endif
			<div class="form-group row">
		        <label class="col-form-label col-lg-2">Nama</label>
		        <div class="col-lg-10">
		            {!! Form::text('nama', null, ['class'=>'form-control', 'id'=>'nama']) !!}
		        </div>
		    </div>

		    <div class="form-group row">
		    	<div class="col-lg-12 text-right">
		    		<button type="submit" class="btn btn-primary">Simpan</button> 
                    <a href="{{route('master.kategori-index')}}">
                        <button type="button" class="btn btn-light legitRipple">Kembali</button>
                    </a>
		    	</div>
		    </div>
		</form>
	</div>
<!-- </div> -->
@endsection