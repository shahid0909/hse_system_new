<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_employees', function (Blueprint $table) {
            $table->id();
            $table->string('em_name');
            $table->string('em_designation');
            $table->string('em_department');
            $table->string('em_ic_passport_no');
            $table->string('em_mail');
            $table->string('em_phone');
            $table->string('em_country');
            $table->date('em_j_date');
            $table->string('em_profile');
            $table->string('em_status');
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
        Schema::dropIfExists('l_employees');
    }
}
