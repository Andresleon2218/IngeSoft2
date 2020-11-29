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
            $table->date('date')->nullable(false);
            $table->time('start')->nullable(false);
            $table->time('end')->nullable(false);
            $table->foreignId('professional_id')->constrained('users')->nullable(false)
                    ->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('client_id')->constrained('users')->nullable(false)
                    ->onDelete('restrict')->onUpdate('cascade');
            $table->enum('active',['yes','no'])->default('yes')->nullable(false);
            $table->text('description');
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
