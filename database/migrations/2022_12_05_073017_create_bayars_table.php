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
        Schema::create('bayars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->string('nama_konser');
            $table->integer('nohp');
            $table->string('email');
            $table->integer('jmlhtkt');
            $table->integer('ttltkt');
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
        Schema::dropIfExists('bayars');
    }
};
