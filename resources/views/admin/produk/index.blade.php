@extends('layouts.app')

@section('title', 'Produk - Majoo Indonesia')

@section('panel-heading', 'List Produk')

@section('content')

<div class="row" style="padding: 10px">
    <!-- Notifikasi -->
    @if (Session::has('error'))
        <div class="alert alert-danger alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ Session::get('error', 'Error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-styled-right alert-arrow-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            {{ Session::get('success', 'Success') }}
        </div>
    @endif
    <!-- ./notifikasi -->
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="{{ route('produk.entri') }}" role="button">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col">ID</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col" class="text-end"><span>Action</span></th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>
                                {{ !empty($row->kategori)?$row->kategori->nama:'' }}
                            </td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ rupiah($row->harga) }}</td>
                            <td class="text-end">
                                <a class="btn btn-info btn-sm" href="{{ route('produk.entri', ['id' => $row->id]) }}" role="button">Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return ConfirmDelete()" href="{{ route('produk.delete', ['id' => $row->id]) }}" role="button">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align: center;">Data Kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="pull-right">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        function ConfirmDelete() {
            var x = confirm("Apakah anda yakin akan menghapus data?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection