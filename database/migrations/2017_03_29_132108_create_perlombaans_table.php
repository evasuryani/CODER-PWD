<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerlombaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perlombaan', function(Blueprint $table) {
            $table->increments('id_lomba');
            $table->string('nama_lomba', 150);
            $table->integer('id');
            $table->integer('id_bidang');
            $table->date('tgl_perlombaan');
            $table->text('deskripsi');
            $table->string('link',200);
            $table->string('poster',150);
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
        Schema::drop('perlombaan');
    }
}
