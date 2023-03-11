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
        Schema::create('tb_ruangan', function (Blueprint $table) {
            $table->id('NO');
            $table->string('id_ruangan');
            $table->string('nama_ruangan');
            $table->string('kapasitas');
            $table->string('PJ');
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
        Schema::dropIfExists('tb_ruangan');
    }
};
