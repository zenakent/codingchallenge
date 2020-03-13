<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
            $table->id();
            $table->string('title');
            // $table->integer('date_day');
            $table->string('daysOfWeek')->default(Carbon::now()->dayOfWeek);
            $table->date('startRecur')->default(Carbon::now());
            $table->date('endRecur')->default(Carbon::now()->add(1, 'day'));
            // $table->date('start');
            // $table->date('end');
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
