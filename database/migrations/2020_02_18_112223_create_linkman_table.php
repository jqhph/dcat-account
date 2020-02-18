<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('姓名');
            $table->string('mobile')->index()->comment('手机');
            $table->tinyInteger('gender')->comment('性别，0未知，1男，2女');
            $table->string('birthday')->comment('生日');
            $table->integer('province_id')->default(0);
            $table->integer('city_id')->default(0);
            $table->integer('district_id')->default(0);
            $table->string('address')->comment('详细地址');
            $table->text('description')->comment('描述')->nullable();
            $table->string('nickname')->comment('昵称');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linkman');
    }
}
