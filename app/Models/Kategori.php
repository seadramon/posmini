<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
