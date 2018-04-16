<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQtxxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qtxxes', function (Blueprint $table) {
            $table->increments('jbxx_id');
            $table->string('fclb') -> nullable();
            $table->string('gmsj') -> nullable();
            $table->string('gmjg') -> nullable();
            $table->string('gmfs') -> nullable();
            $table->string('gmdz') -> nullable();
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
        Schema::dropIfExists('qtxxes');
    }
}
