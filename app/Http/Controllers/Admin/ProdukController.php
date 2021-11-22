<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Models\Kategori;

use DB;
use Session;
use Validator;
use Storage;

class ProdukController extends Controller
{
    public function index()
    {
    	$data = Produk::with('kategori')->paginate(10);
    	
    	return view('admin.produk.index', [
    		'data' => $data
    	]);
    }

    public function entri($id = null)
    {
    	$data = null;
    	if ($id) {
    		$data = Produk::find($id);
    	}

        $kategori = Kategori::get()->pluck('nama', 'id')->toArray();
        $labelKategori = ["" => "-             Pilih Kategori             -"];
        $kategori = $labelKategori + $kategori;

    	return view('admin.produk.entri', [
    		'id' => $id,
    		'data' => $data,
            'kategori' => $kategori
    	]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
    	DB::beginTransaction();

        try {
        	Validator::make($request->all(), [
			    'nama' => 'required|max:100|unique:produk',
                'deskripsi' => 'required',
                'harga' => 'required|numeric',
                'gambar' => 'required|file|mimes:jpg,bmp,png,jpeg',
			])->validate();

        	if ($request->id) {
                $data = Produk::find($request->id);
            } else {
                $data = new Produk();
            }

            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->harga = $request->harga;
            $data->kategori_id = $request->kategori_id;

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();

                $dir = 'produk_img/';
                cekDir($dir);

                $filename = trim($request->nama) . '.' . $extension;
                Storage::disk('public')->put($dir.$filename, \File::get($file));
                
                $data->gambar = $filename;
            }
            
            $data->save();

            DB::commit();

            Session::flash('success', 'Data berhasil disimpan');
        } catch(Exception $e) {
        	DB::rollback();
            Session::flash('error', 'Data gagal disimpan.');
        }

        return redirect()->route('produk.index');
    }

    public function delete($id)
    {
    	DB::beginTransaction();

    	try {
	    	$data = Produk::find($id);
	    	$data->delete();

	    	DB::commit();
            Session::flash('success', 'Data berhasil dihapus');
	    } catch (Exception $e) {
	    	DB::rollback();
            Session::flash('error', 'Data gagal dihapus.');
	    }

	    return redirect()->route('produk.index');
    }
}
