<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$url = \URL::to('/').'/api/produk/index';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $response = $response->getBody()->getContents();

        dd($response);*/
        // connection refused
         
        $data = Produk::get();

        return view('home', [
            'data' => $data
        ]);
    }
}
