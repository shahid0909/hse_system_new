<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_rules', function (Blueprint $table) {
            $table->id();
            $table->longText('commitment');
            $table->string('tagline');
            $table->integer('employee_id');
            $table->integer('designation_id');
            $table->integer('comapny_id');
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
        Schema::dropIfExists('s_rules');
    }
}
