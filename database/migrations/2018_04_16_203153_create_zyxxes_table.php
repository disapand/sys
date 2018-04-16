<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZyxxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zyxxes', function (Blueprint $table) {
            $table->integer('jbxx_id');
            $table->string('gzdw') -> nullable();
            $table->string('dwxz') -> nullable();
            $table->string('sshy') -> nullable();
            $table->string('rzbm') -> nullable();
            $table->string('zw') -> nullable();
            $table->string('rzsj');
            $table->string('dwdz');
            $table->string('dwdh');
            $table->string('rzxs');
            $table->string('zsr');
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
        Schema::dropIfExists('zyxxes');
    }
}
