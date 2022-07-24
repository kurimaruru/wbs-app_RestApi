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
            $table->integer('wbsId');
            $table->string('user', 30);
            $table->string('comment');
            $table->timestamps();
            $table->primary(['wbsId', 'user']);
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
