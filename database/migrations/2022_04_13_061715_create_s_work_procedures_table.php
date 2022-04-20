<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSWorkProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_work_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('work_title');
            $table->longText('before_work_rules');
             $table->string('before_work_image');
            $table->longText('during_work_rules');
            $table->string('during_work_image');
            $table->longText('after_work_rules');
            $table->string('after_work_image');
            $table->longText('potential_hazard');
            $table->string('potential_hazard_image');
            $table->text('ppe');
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
        Schema::dropIfExists('s_work_procedures');
    }
}
