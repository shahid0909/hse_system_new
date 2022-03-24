<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('u_name');
            $table->string('password');
            $table->string('com_name');
            $table->string('com_person');
            $table->integer('com_m_number');
            $table->string('com_address');
            $table->string('com_email');
            $table->string('com_url');
            $table->string('com_country');
            $table->string('com_state');
            $table->string('com_city');
            $table->string('com_postal');
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
        Schema::dropIfExists('company_profiles');
    }
}
