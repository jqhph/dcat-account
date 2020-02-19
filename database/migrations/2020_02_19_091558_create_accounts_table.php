<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('money')->comment('总金额，厘');
            $table->unsignedInteger('user_id')->comment('用户');
            $table->unsignedInteger('organization_id')->default(0)->comment('机构');
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('order')->default(10)->comment('排序，值越小越靠前');
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
        Schema::dropIfExists('accounts');
    }
}
