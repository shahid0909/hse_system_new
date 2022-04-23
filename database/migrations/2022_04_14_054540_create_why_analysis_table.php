<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_analysis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('l_employee_id');
            $table->string('why1');
            $table->string('why2');
            $table->string('why3');
            $table->string('why4');
            $table->string('why5');
            $table->string('rootCause');
            $table->string('reOccurrence');
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
        Schema::dropIfExists('why_analysis');
    }
}
