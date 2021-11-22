<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kategori;

use DB;
use Session;
use Validator;

class KategoriController extends Controller
{

    public function index()
    {
    	$data = Kategori::paginate(10);
    	
    	return view('admin.master.kategori.index', [
    		'data' => $data
    	]);
    }

    public function entri($id = null)
    {
    	$data = null;
    	if ($id) {
    		$data = Kategori::find($id);
    	}

    	return view('admin.master.kategori.entri', [
    		'id' => $id,
    		'data' => $data
    	]);
    }

    public function store(Request $request)
    {
    	DB::beginTransaction();

        try {
        	Validator::make($request->all(), [
			    'nama' => 'required|max:100'
			])->validate();

        	if ($request->id) {
                $data = Kategori::find($request->id);
            } else {
                $data = new Kategori();
            }

            $data->nama = $request->nama;
            
            $data->save();

            DB::commit();

            Session::flash('success', 'Data berhasil disimpan');
        } catch(Exception $e) {
        	DB::rollback();
            Session::flash('error', 'Data gagal disimpan.');
        }

        return redirect()->route('master.kategori-index');
    }

    public function delete($id)
    {
    	DB::beginTransaction();

    	try {
	    	$data = Kategori::find($id);
	    	$data->delete();

	    	DB::commit();
            Session::flash('success', 'Data berhasil dihapus');
	    } catch (Exception $e) {
	    	DB::rollback();
            Session::flash('error', 'Data gagal dihapus.');
	    }

	    return redirect()->route('master.kategori-index');
    }
}
