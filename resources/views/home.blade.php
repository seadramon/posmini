@extends('layouts.app_front')

@section('content')

<div class="container-fluid main-container">
    <div class="col-md-12">
        <h2>Produk</h2>
    </div>
    @if (count($data) > 0)
        <div class="row pricing">
            @foreach($data as $row)
                <div class="col-md-3">
                    <div class="well" style="height: 40em;">
                        <img src="{{ asset('storage/produk_img/'.$row->gambar) }}">
                        <h4>{{ $row->nama }}</h4>
                        <h3><b>{{ rupiah($row->harga) }}</b></h3>
                        <br>
                        {{ \Str::words(strip_tags($row->deskripsi), 40)}}<br>

                        <a href="#" class="btn btn-success btn-block" style="margin-top:10px; ">Beli</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
