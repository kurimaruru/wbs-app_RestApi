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
        Schema::create('wbs', function (Blueprint $table) {
            $table->id();
            $table->string('mainItem');
            $table->string('subItem');
            $table->date('plansStartDay');
            $table->date('plansFinishDay');
            $table->date('resultStartDay');
            $table->date('resultsFinishDay');
            $table->integer('progress');
            $table->integer('productionCost');
            $table->string('rep');
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
        Schema::dropIfExists('wbs');
    }
};
