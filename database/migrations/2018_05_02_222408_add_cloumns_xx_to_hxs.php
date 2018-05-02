<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCloumnsXxToHxs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hks', function (Blueprint $table) {
            $table -> integer('jkbh');
            $table -> string('hkje');
            $table -> string('bj');
            $table -> string('lx');
            $table -> string('hksj') ->default(\Carbon\Carbon::now() -> toDateString());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hks', function (Blueprint $table) {
            $table -> dropColumn('jkbh');
            $table -> dropColumn('hkje');
            $table -> dropColumn('bj');
            $table -> dropColumn('lx');
            $table -> dropColumn('hksj');
        });
    }
}
