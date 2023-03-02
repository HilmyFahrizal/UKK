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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->Uuid()->unique();
            $table->foreignId('user_id');
            $table->string('snap_token')->nullable();
            $table->foreignId('alamat_id');
            $table->enum('payment_status', ['1', '2', '3', '4'])->comment('1=Menunggu Pembayaran, 2=Sudah Dibayar, 3=Kadaluarsa, 4=Batal');
            $table->enum('status', ['1', '2', '3', '4', '5'])->comment('1=Menunggu Konfirmasi, 2=Proses, 3=Dikirim, 4=Selesai, 5=Dibatalkan');
            $table->enum('courier', ['jne', 'tiki', 'pos']);
            $table->string('layanan');
            $table->double('total');
            $table->double('ongkir');
            $table->string('estimasi');
            $table->text('catatan')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pembayarans');
    }
};
