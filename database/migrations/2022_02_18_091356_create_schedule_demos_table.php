<?php

use App\Models\ScheduleDemo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleDemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new ScheduleDemo())->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignId('industry_type_id');
            $table->integer('number_of_employees');
            $table->string('email_address');
            $table->string('person_incharge');
            $table->string('designation');
            $table->string('contact_no');
            $table->date('meeting_date');
            $table->time('meeting_time');
            $table->integer('status')->default(1)->comment("0:inactive,1:active");
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
        Schema::dropIfExists((new ScheduleDemo())->getTable());
    }
}
