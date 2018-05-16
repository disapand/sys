<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToLxrxx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lxrxxes', function (Blueprint $table) {
            $table->string('lxrjzdz')->nullable();
            $table->string('lxrgzdw')->nullable();
            $table->string('lxrjzdz2')->nullable();
            $table->string('lxrgzdw2')->nullable();
            $table->string('lxrjzdz3')->nullable();
            $table->string('lxrgzdw3')->nullable();
            $table->string('lxrjzdz4')->nullable();
            $table->string('lxrgzdw4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lxrxxes', function (Blueprint $table) {
            $table->dropColumn(['lxrjzdz', 'lxrgzdw', 'lxrjzdz2', 'lxrgzdw2','lxrjzdz3', 'lxrgzdw3','lxrjzdz4', 'lxrgzdw4',]);
        });
    }
}
