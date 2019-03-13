<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_turma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned();
            $table->integer('turma_id')->unsigned();

            $table->foreign('professor_id')->references('id')->on('professors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('turma_id')->references('id')->on('turmas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('professor_turma');
    }
}
