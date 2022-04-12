<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafetyWorkProcedureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safety_work_procedure', function (Blueprint $table) {
            $table->id();
            $table->string('work_title');
            $table->string('before_work_rules');
            $table->string('before_work_image');
            $table->string('during_work_rules');
            $table->string('during_work_image');
            $table->string('after_work_rules');
            $table->string('after_work_image');
            $table->string('potential_hazard');
            $table->string('potential_hazard_image');
            $table->integer('ppe');
            $table->string('remarks');
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
        Schema::dropIfExists('safety_work_procedure');
    }
}
