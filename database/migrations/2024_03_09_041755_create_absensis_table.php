<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('materi_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('id_asisten')->constrained();
            $table->string('teaching_role');
            $table->date('date');
            $table->time('start');
            $table->time('end')->nullable();
            $table->integer('duration')->nullable();;
            $table->foreignId('code_id')->constrained();
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
        Schema::dropIfExists('absensis');
    }
}
