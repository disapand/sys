<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsLxrxx234ToLxrxx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lxrxxes', function (Blueprint $table) {
            $table -> string('lxr2') -> nullable();
            $table -> string('gx2') -> nullable();
            $table -> string('lxdh2') -> nullable();
            $table -> string('sfzh2') -> nullable();
            $table -> string('dk2') -> nullable();
            $table -> string('lxr3') -> nullable();
            $table -> string('gx3') -> nullable();
            $table -> string('lxdh3') -> nullable();
            $table -> string('sfzh3') -> nullable();
            $table -> string('dk3') -> nullable();
            $table -> string('lxr4') -> nullable();
            $table -> string('gx4') -> nullable();
            $table -> string('lxdh4') -> nullable();
            $table -> string('sfzh4') -> nullable();
            $table -> string('dk4') -> nullable();
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
            $table -> dropColumn('lxr2');
            $table -> dropColumn('gx2');
            $table -> dropColumn('lxdh2');
            $table -> dropColumn('sfzh2');
            $table -> dropColumn('dk2');
            $table -> dropColumn('lxr3');
            $table -> dropColumn('gx3');
            $table -> dropColumn('lxdh3');
            $table -> dropColumn('sfzh3');
            $table -> dropColumn('dk3');
            $table -> dropColumn('lxr4');
            $table -> dropColumn('gx4');
            $table -> dropColumn('lxdh4');
            $table -> dropColumn('sfzh4');
            $table -> dropColumn('dk4');
        });
    }
}
