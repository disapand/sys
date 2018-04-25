<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jks', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('jbxx_id');
            $table -> string('jklx');
            $table -> string('hth') -> nullable();
            $table -> string('jkqx');
            $table -> string('jkje');
            $table -> string('ll');
            $table -> string('sxf');
            $table -> timestamp('jksj')->default(\Carbon\Carbon::now());
            $table -> string('hkfs');
            $table -> integer('tjr');
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
        Schema::dropIfExists('jks');
    }
}
