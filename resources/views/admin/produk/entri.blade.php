@extends('layouts.app')

@section('title', 'Form Produk - Majoo Indonesia')

@section('panel-heading', 'Form Produk')

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

		<div class="alert alert-success alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            Data Berhasil disimpan
        </div>
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
		    <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
	$(".alert-success").hide();

	$(".select2").select2();

	$('.summernote').summernote();

	(function() {
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');

		$('form').ajaxForm({
		    beforeSend: function() {
		        status.empty();
		        var percentVal = '0%';
		        var posterValue = $('input[name=gambar]').fieldValue();
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    uploadProgress: function(event, position, total, percentComplete) {
		        var percentVal = percentComplete + '%';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    success: function() {
		        var percentVal = 'Wait, Saving';
		        bar.width(percentVal)
		        percent.html(percentVal);
		    },
		    complete: function(xhr) {
		        status.html(xhr.responseText);
		        alert('Data berhasil disimpan');
		        $(".alert-success").show();
		        window.location.href = "/admin/produk";
		    }
		});
    })();
});
</script>
@endsection