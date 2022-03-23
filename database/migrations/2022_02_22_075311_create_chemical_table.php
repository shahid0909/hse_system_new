<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemical', function (Blueprint $table) {
            $table->id();
            $table->string('Chemical_Name');
            $table->string('product_code');
            $table->string('product_indentifier');
            $table->integer('manufacturer_id');
            $table->integer('supplier_id');
            $table->integer('cas_id');
            $table->integer('physical_form_id');
            $table->integer('ghs_label_id');
            $table->integer('hazard_id');
            $table->string('che_image');
            $table->string('active_yn');
            $table->string('che_sds_image');
            $table->string('che_sds_bn_image');
            $table->string('remarks');
//            $table->foreign('manufacturer_id')
//                ->references('id')
//                ->on('l_manufacturer');
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
        Schema::dropIfExists('chemical');
    }
}
