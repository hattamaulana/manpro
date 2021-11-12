<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psikolog_id');
            $table->unsignedBigInteger('paket_id');
            $table->string('token');
            $table->string('nama');
            $table->string('email');
            $table->string('no_wa');
            $table->string('gender');
            $table->string('bod');
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('pakets')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('psikolog_id')->references('id')->on('psikologs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsultasis');
    }
}
