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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable()->default(null);
            $table->string('nm_lengkap');
            $table->string('nm_user')->unique();
            $table->string('email')->unique();
            $table->string('no_telepon')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat')->nullable()->default(null);
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
