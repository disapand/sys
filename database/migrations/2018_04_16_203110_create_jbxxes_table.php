<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJbxxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jbxxes', function (Blueprint $table) {
            $table->increments('id') -> index();
            $table->string('name');
            $table->string('tel');
            $table->string('IDCard', 100) -> index();
            $table->string('sex');
            $table->string('jklb');
            $table->string('xl') -> nullable();
            $table->string('hj') -> nullable();
            $table->string('addr');
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
        Schema::dropIfExists('jbxxes');
    }
}
