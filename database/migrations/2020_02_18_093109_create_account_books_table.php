<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户');
            $table->integer('money')->comment('单位厘，1000=1元，负数为支出');
            $table->integer('category_id')->comment('分类');
            $table->text('description')->nullable()->comment('描述');
            $table->string('organization_id')->comment('机构');
            $table->unsignedInteger('payment_method_id')->comment('收、付款方式');
            $table->tinyInteger('deferable')->default(0)->comment('是否延迟收、付款');
            $table->tinyInteger('state')->default(1)->comment('状态，1正常，2预收');
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
        Schema::dropIfExists('account_books');
    }
}
