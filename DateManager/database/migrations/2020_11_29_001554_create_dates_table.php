<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->foreignId('schedule_id')->constrained('schedules')
                    ->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('client_id')->constrained('users')
                    ->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('active')->default(true);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('dates');
    }
}
