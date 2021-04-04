<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlTimeAddSubjectIdIntoTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controltime_times', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->default(1);
            $table->foreign('subject_id')->references('id')->on('controltime_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controltime_times', function (Blueprint $table) {
            #$table->dropForeign('subject_id');
            $table->dropColumn('subject_id');
        });
    }
}
