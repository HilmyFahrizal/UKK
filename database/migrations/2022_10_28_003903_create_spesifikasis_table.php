<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spesifikasis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nm_spesifikasi');
            $table->string('deskripsi');
            $table->foreignId('produk_id')->references('id')->on('produks')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spesifikasis');
    }
};
