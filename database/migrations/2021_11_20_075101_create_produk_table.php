<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kategori_id')->unsigned()->index();
            $table->string('nama', 100)->unique();
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('gambar', 100);
            $table->timestamps();
        });

        Schema::table('produk', function($table) {
            $table->foreign('kategori_id')->references('id')->on('kategori_produk');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
