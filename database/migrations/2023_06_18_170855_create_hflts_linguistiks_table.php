<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHfltsLinguistiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hflts_linguistiks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_linguistik'); // Menggunakan unsignedBigInteger untuk relasi
            $table->float('A');
            $table->float('B');
            $table->float('C');
            $table->float('D');
            $table->timestamps();

            // Menambahkan relasi foreign key
            $table->foreign('id_linguistik')->references('id')->on('linguistiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hflts_linguistiks');
    }
}
