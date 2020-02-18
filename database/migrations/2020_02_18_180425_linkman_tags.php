<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LinkmanTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkman_tags', function (Blueprint $table) {
            $table->integer('linkman_id');
            $table->integer('tag_id');
            $table->integer('order')->default(10)->comment('排序，值越小越靠前');

            $table->primary(['linkman_id', 'tag_id']);
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
        Schema::dropIfExists('linkman_tags');
    }
}
