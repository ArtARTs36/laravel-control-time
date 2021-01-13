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
        Schema::create('times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string(\ArtARTs36\ControlTime\Models\Time::FIELD_COMMENT, 250)->nullable();
            $table->date(\ArtARTs36\ControlTime\Models\Time::FIELD_DATE);
            $table->integer(\ArtARTs36\ControlTime\Models\Time::FIELD_QUANTITY);
            $table->unsignedInteger(\ArtARTs36\ControlTime\Models\Time::FIELD_EMPLOYEE_ID);

            $table->foreign(\ArtARTs36\ControlTime\Models\Time::FIELD_EMPLOYEE_ID)
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
        Schema::dropIfExists('times');
    }
}
