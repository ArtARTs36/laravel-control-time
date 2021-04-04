<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlTimeCreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controltime_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('title');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('controltime_subject_types');

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
        Schema::dropIfExists('controltime_subjects');
    }
}
