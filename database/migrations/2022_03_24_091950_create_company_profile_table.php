<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('password');
            $table->string('company_name');
            $table->string('contact_person');
            $table->integer('mobile_number');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('web_url');
            $table->integer('country');
            $table->integer('state');
            $table->integer('city');
            $table->integer('postal_code');
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
        Schema::dropIfExists('compnay_profile_tables');
    }
}
