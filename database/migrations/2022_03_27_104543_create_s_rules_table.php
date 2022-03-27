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
            $table->longText('s_head');
            $table->string('rules_a');
            $table->string('rules_b');
            $table->string('rules_c');
            $table->string('rules_d');
            $table->string('rules_e');
            $table->string('rules_f');
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
