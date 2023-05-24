<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 100);  // Azienda
            $table->string('departure_station', 100);  // Stazione di partenza
            $table->string('arrival_station', 100);  // Stazione di arrivo
            $table->time('departure_time');  // Orario di partenza
            $table->time('arrival_time');  // Orario di arrivo
            $table->string('train_code', 50);  // Codice Treno
            $table->integer('carriage_count');  // Numero Carrozze
            $table->boolean('on_schedule');  // In orario
            $table->boolean('cancelled');  // Cancellato
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
        Schema::dropIfExists('trains');
    }
};
