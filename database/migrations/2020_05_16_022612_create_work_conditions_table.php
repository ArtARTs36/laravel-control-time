<?php

use Dba\ControlTime\Models\WorkCondition;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controltime_work_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string(WorkCondition::FIELD_POSITION, 50)->nullable();
            $table->double(WorkCondition::FIELD_RATE);
            $table->unsignedInteger(WorkCondition::FIELD_EMPLOYEE_ID);
            $table->integer(WorkCondition::FIELD_AMOUNT_HOUR);
            $table->integer(WorkCondition::FIELD_AMOUNT_MONTH);

            $table->foreign(WorkCondition::FIELD_EMPLOYEE_ID)
                ->references('id')
                ->on(\Dba\ControlTime\Support\Proxy::getEmployeeTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controltime_work_conditions');
    }
}
