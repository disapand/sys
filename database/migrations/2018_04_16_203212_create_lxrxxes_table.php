<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLxrxxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lxrxxes', function (Blueprint $table) {
            $table->integer('jbxx_id');
            $table->string('lxr') -> nullable();
            $table->string('gx') -> nullable();
            $table->string('lxdh') -> nullable();
            $table->string('sfzh') -> nullable();
            $table->string('dk') -> nullable();
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
        Schema::dropIfExists('lxrxxes');
    }
}
