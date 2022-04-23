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
            $table->integer('hirarc_id')->unsigned();
            $table->foreign('hirarc_id')->references('id')->on('i_hirarcs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('job_activity');
            $table->string('image1');
            $table->longText('sequence_job');
            $table->longText('hazard');
            $table->string('c_hazard');
            $table->longText('event_consequences');
            $table->longText('risk_control');
            $table->longText('j_likelihood');
            $table->integer('likelihood_l');
            $table->integer('severity_s');
            $table->integer('rmn');
            $table->longText('additional_risk');
            $table->integer('likelihood_l1');
            $table->integer('severity_S1');
            $table->integer('rmn1');
            $table->longText('remarks');
            $table->date('pic_date');
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
