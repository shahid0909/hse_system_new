<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemical_listing', function (Blueprint $table) {
            $table->id();
            $table->integer('chemical_id');
            $table->integer('ppe_id');
            $table->string('usage');
            $table->string('employee');
            $table->integer('no_of_emplyees');
            $table->integer('quantity');
            $table->string('lang');
            $table->string('active_yn');
            $table->date('sds_issue_date');
            $table->string('sds_link');
            $table->string('remark');
            $table->string('signal_word');
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
        Schema::dropIfExists('chemical_listing');
    }
}
