<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIHirarcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_hirarcs', function (Blueprint $table) {
            $table->id();
            $table->integer('depertment_id');
           $table->string('process');
            $table->string('location');
            $table->string('rm_assessor');
            $table->string('rm_member1');
            $table->string('rm_member2');
            $table->string('rm_member3');
            $table->string('rm_member4');
            $table->date('last_assessment');
            $table->date('assessment_date');
            $table->string('Signature');
            $table->integer('designation_id');
            $table->integer('employee_id');
            $table->date('date');
           $table->string('Reference_no')->nullable();

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
        Schema::dropIfExists('i_hirarcs');
    }
}
