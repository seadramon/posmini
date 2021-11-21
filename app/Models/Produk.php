<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';

    public function kategori()
    {
    	return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }
}
