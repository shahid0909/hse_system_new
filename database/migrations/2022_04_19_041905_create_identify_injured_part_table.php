<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifyInjuredPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identify_injured_part', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('l_employee_id');
            $table->string('head')->nullable();
            $table->string('right_toe')->nullable();
            $table->string('burn')->nullable();
            $table->string('sprain')->nullable();
            $table->string('left_toe')->nullable();
            $table->string('right_eye')->nullable();
            $table->string('neck')->nullable();
            $table->string('bruise')->nullable();
            $table->string('fracture')->nullable();
            $table->string('left_eye')->nullable();
            $table->string('right_ear')->nullable();
            $table->string('back')->nullable();
            $table->string('concussion')->nullable();
            $table->string('foreign_body')->nullable();
            $table->string('left_ear')->nullable();
            $table->string('right_arm')->nullable();
            $table->string('right_chest')->nullable();
            $table->string('laceration')->nullable();
            $table->string('amputation')->nullable();
            $table->string('left_arm')->nullable();
            $table->string('left_chest')->nullable();
            $table->string('right_hand')->nullable();
            $table->string('internal')->nullable();
            $table->string('crush')->nullable();
            $table->string('rash')->nullable();
            $table->string('left_hand')->nullable();
            $table->string('right_hand_finger')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('eclectic_shock')->nullable();
            $table->string('inhalation')->nullable();
            $table->string('left_hand_finger')->nullable();
            $table->string('right_leg')->nullable();
            $table->string('right_groin')->nullable();
            $table->string('hernia')->nullable();
            $table->string('abrasion')->nullable();
            $table->string('left_leg')->nullable();
            $table->string('left_groin')->nullable();
            $table->string('right_knee')->nullable();
            $table->string('right_shoulder')->nullable();
            $table->string('tendinitis')->nullable();
            $table->string('left_knee')->nullable();
            $table->string('left_shoulder')->nullable();
            $table->string('right_foot')->nullable();
            $table->string('right_ankle')->nullable();
            $table->string('strain')->nullable();
            $table->string('left_foot')->nullable();
            $table->string('left_ankle')->nullable();
            $table->string('hip')->nullable();
            $table->string('others1')->nullable();
            $table->string('others2')->nullable();
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
        Schema::dropIfExists('identify_injured_part');
    }
}
