<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFjxxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fjxxes', function (Blueprint $table) {
            $table->integer('jbxx_id');
            $table->string('fjxx') -> nullable();
            $table->integer('tjr');

            //基本信息审核相关字段
            $table->boolean('jbxx_zt')->default(false);
            $table->string('jbxx_yj');
            $table->integer('jbxxshr');
            $table->string('jbxxshsj');

            //职业信息审核相关字段
            $table->boolean('zyxx_zt')->default(false);
            $table->string('zyxx_yj');
            $table->integer('zyxxshr');
            $table->string('zyxxshsj');

            //联系人信息审核相关字段
            $table->boolean('lxrxx_zt')->default(false);
            $table->string('lxrxx_yj');
            $table->integer('lxrxxshr');
            $table->string('lxrxxshsj');

            //其他信息审核相关字段
            $table->boolean('qtxx_zt')->default(false);
            $table->string('qtxx_yj');
            $table->integer('qtxxshr');
            $table->string('qtxxshsj');

            //附加信息审核相关字段
            $table->boolean('fjxx_zt')->default(false);
            $table->string('fjxx_yj');
            $table->integer('fjxxshr');
            $table->string('fjxxshsj');

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
        Schema::dropIfExists('fjxxes');
    }
}
