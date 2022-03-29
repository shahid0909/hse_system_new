<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_inspections', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('pic');
            $table->text('unsafe');
            $table->text('text');
            $table->text('Justification');
            $table->date('admitdate');
            $table->date('targetdate');
            $table->string('priority');
            
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
        Schema::dropIfExists('create_inspections');
    }
}
