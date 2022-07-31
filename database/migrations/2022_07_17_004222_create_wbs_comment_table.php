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
        Schema::create('wbs_comment', function (Blueprint $table) {
            $table->integer('wbsId')->references('id')->on('wbs')->cascadeOnDelete();
            $table->string('user', 30);
            $table->string('comment');
            $table->boolean('confirmFlag');
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
        Schema::dropIfExists('wbs_comment');
    }
};
