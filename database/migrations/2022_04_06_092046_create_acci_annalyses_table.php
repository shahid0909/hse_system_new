<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcciAnnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acci_annalyses', function (Blueprint $table) {
            $table->id();
            $table->text('inc_number');
            $table->string('em_dept');
            $table->string('em_name');
            $table->string('em_des');
            $table->string('l_of_incident');
            $table->string('t_of_accident');
            $table->time('tim_of_incident');
            $table->string('rpt_to_dosh');
            $table->string('st_of_invesg');
            $table->string('outcom_of_investg');
            $table->string('summ_of_incident');
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
        Schema::dropIfExists('acci_annalyses');
    }
}
