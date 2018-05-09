<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsSqsjToJk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jks', function (Blueprint $table) {
            $table -> string('dqsj') -> nullable();
            $table -> string('zlx') ->default(0);
            $table -> string('yhlx') ->default(0);
            $table -> string('sfyh') ->default('否');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jks', function (Blueprint $table) {
            $table -> string('dqsj');
            $table -> string('zlx');
            $table -> string('yhlx');
            $table -> string('sfyh');
        });
    }
}
