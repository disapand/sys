<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsKhjlToFjxx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fjxxes', function (Blueprint $table) {
            $table -> string('khjl') -> after('fjxx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fjxxes', function (Blueprint $table) {
            $table -> dropColumn('khjl');
        });
    }
}
