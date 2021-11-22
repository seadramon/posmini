<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Produk;
use App\Http\Resources\Produk as ProdukResource;

class ProdukController extends Controller
{
	/**
     * query produk data.
     *
     * @return json
     */
    public function index(Request $request)
    {
    	$data = Produk::get();

    	return new ProdukResource($data);
    }
}
