<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlTimeAddUniqueKeyIntoTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controltime_times', function (Blueprint $table) {
            $table->unique(['date', 'employee_id', 'subject_id'], 'unique_date_employee_subject');
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
