<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountBookTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_book_tags', function (Blueprint $table) {
            $table->integer('account_book_id');
            $table->integer('tag_id');
            $table->integer('order')->default(10)->comment('排序，值越小越靠前');

            $table->primary(['account_book_id', 'tag_id']);
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
        Schema::dropIfExists('account_book_tags');
    }
}
