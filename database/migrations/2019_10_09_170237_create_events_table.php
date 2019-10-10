<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            //S|M|T|W|T|F|S
            //0|1|0|1|0|1|0
            $table->string('recurrence', 13)->default("0|0|0|0|0|0|0");
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
        Schema::dropIfExists('events');
    }
}
