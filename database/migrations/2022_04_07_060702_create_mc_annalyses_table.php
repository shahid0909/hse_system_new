<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcAnnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_annalyses', function (Blueprint $table) {
            $table->id();
            $table->foreign('acci_annalyses_id')->references('id')->on('acci_annalyses')->onDelete('cascade');
            $table->bigInteger('acci_annalyses_id')->unsigned()->index();
            $table->date('s_date');
            $table->date('e_date');
            $table->integer('total_duration');
            $table->string('typ_of_notif');
            $table->string('typ_of_record');
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
        Schema::dropIfExists('mc_annalyses');
    }
}
