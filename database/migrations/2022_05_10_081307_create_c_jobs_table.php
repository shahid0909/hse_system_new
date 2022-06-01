<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('hirarc_id')->unsigned();
            $table->foreign('hirarc_id')->references('id')->on('i_hirarcs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('job_activity');
            $table->string('image');
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
        Schema::dropIfExists('c_jobs');
    }
}
