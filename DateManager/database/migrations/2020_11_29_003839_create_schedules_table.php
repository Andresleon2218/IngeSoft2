<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->boolean('monday')->nullable(false);
            $table->boolean('tuesday')->nullable(false);
            $table->boolean('wednesday')->nullable(false);
            $table->boolean('thursday')->nullable(false);
            $table->boolean('friday')->nullable(false);
            $table->boolean('saturday')->nullable(false);
            $table->boolean('sunday')->nullable(false);
            $table->time('start_time')->nullable(false);
            $table->time('end_time')->nullable(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('professional_id')->constrained('users')->nullable(false)
                    ->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('schedules');
    }
}
