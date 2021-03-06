<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controltime_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('comment', 250)->nullable();
            $table->date('date');
            $table->integer('quantity');
            $table->unsignedInteger('employee_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on(\ArtARTs36\ControlTime\Support\Proxy::getEmployeeTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controltime_times');
    }
}
