<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('student_index');
            $table->integer('class_number');
            $table->string('subject_name');
            $table->float('degree');


            $table->timestamps();
        });

        Schema::table('degrees', function (Blueprint $table) {

            $table->foreign('student_index')->references('index')->on('students');
            $table->foreign('subject_name')->references('name')->on('subjects');
            $table->foreign('class_number')->references('number')->on('subject_clas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}