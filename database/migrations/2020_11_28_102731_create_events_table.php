<?php
# @Date:   2020-11-28T10:27:32+00:00
# @Last modified time: 2020-11-28T10:55:39+00:00




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
            $table->id();
            $table->string('name'); //name of event
            $table->string('description');
            $table->time('start_time'); //hh:mm:ss
            $table->time('end_time'); //hh:mm:ss
            $table->date('date'); //YYYY:MM:DD
            $table->string('commute');
            $table->string('type');
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
