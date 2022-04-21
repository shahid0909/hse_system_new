<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyIncidentHappenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_incident_happen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('l_employee_id');
            $table->string('in_guard')->nullable();
            $table->string('operating_permission')->nullable();
            $table->string('hazard')->nullable();
            $table->string('techniques')->nullable();
            $table->string('device_defective')->nullable();
            $table->string('swp')->nullable();
            $table->string('equipment_defective')->nullable();
            $table->string('device_inoperative')->nullable();
            $table->string('layout_hazardous')->nullable();
            $table->string('defective_equipment')->nullable();
            $table->string('unsafe_lighting')->nullable();
            $table->string('unapproved_way')->nullable();
            $table->string('unsafe_ventilation')->nullable();
            $table->string('lifting_hand')->nullable();
            $table->string('protective_equipment')->nullable();
            $table->string('wrong_posture')->nullable();
            $table->string('appropriate_equipment')->nullable();
            $table->string('horseplay')->nullable();
            $table->string('chemical_handling')->nullable();
            $table->string('insufficient_training')->nullable();
            $table->string('available_equipment')->nullable();
            $table->string('others1')->nullable();
            $table->string('others2')->nullable();
            $table->string('unsafe_conditions')->nullable();
            $table->string('unsafe_acts')->nullable();
            $table->string('prior_incident')->nullable();
            $table->string('similar_incidents')->nullable();
            $table->timestamps();

            $table->foreign('l_employee_id')
                ->references('id')->on('l_employees')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('why_incident_happen');
    }
}
