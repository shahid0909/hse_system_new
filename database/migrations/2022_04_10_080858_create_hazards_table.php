<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHazardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazards', function (Blueprint $table) {
           $table->id();
           $table->integer('depertment_id');
            $table->integer('job_activity_id');
            $table->string('sequence_job');
            $table->string('hazard');
            $table->string('c_hazard');
            $table->string('event_consequences');
            $table->string('risk_control');
            $table->string('j_likelihood');
            $table->integer('likelihood_l');
            $table->integer('severity_s');
            $table->integer('rmn');
            $table->string('additional_risk');
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
        Schema::dropIfExists('hazards');
    }
}
