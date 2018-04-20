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
            $table->increments('id');
            $table->integer('jbxx_id') -> index();
            $table->string('fjxx') -> nullable();
            $table->integer('tjr')->nullable();

            //基本信息审核相关字段
            $table->string('jbxx_zt')->default('待审核');
            $table->string('jbxx_yj')->nullable();
            $table->integer('jbxxshr')->nullable();
            $table->string('jbxxshsj')->nullable();

            //职业信息审核相关字段
            $table->string('zyxx_zt')->default('待审核');
            $table->string('zyxx_yj')->nullable();
            $table->integer('zyxxshr')->nullable();
            $table->string('zyxxshsj')->nullable();

            //联系人信息审核相关字段
            $table->string('lxrxx_zt')->default('待审核');
            $table->string('lxrxx_yj')->nullable();
            $table->integer('lxrxxshr')->nullable();
            $table->string('lxrxxshsj')->nullable();

            //其他信息审核相关字段
            $table->string('qtxx_zt')->default('待审核');
            $table->string('qtxx_yj')->nullable();
            $table->integer('qtxxshr')->nullable();
            $table->string('qtxxshsj')->nullable();

            //附加信息审核相关字段
            $table->string('fjxx_zt')->default('待审核');
            $table->string('fjxx_yj')->nullable();
            $table->integer('fjxxshr')->nullable();
            $table->string('fjxxshsj')->nullable();

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
