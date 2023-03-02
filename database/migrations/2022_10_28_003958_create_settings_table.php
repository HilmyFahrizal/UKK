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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullabel();
            $table->string('name')->nullabel();
            $table->text('deskripsi')->nullabel();
            $table->string('backgorund_login')->nullabel();
            $table->string('backgorund_register')->nullabel();
            $table->string('logo_luar')->nullabel();
            $table->string('logo_dalam')->nullabel();
            $table->string('alamat')->nullabel();
            $table->string('no_telp')->nullabel();
            $table->string('email')->nullabel();
            $table->string('facebook')->nullabel();
            $table->string('instagram')->nullabel();
            $table->string('whatsapp')->nullabel();
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
        Schema::dropIfExists('settings');
    }
};
