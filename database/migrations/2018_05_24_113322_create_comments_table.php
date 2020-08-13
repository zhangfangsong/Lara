<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->bigInteger('post_id')->unsigned()->index()->comment('文章id');
            $table->bigInteger('user_id')->unsigned()->index()->comment('用户id');
            $table->string('content')->comment('评论内容');
            $table->bigInteger('at_id')->unsigned()->default(0)->index()->comment('回复评论id');
            $table->string('ip')->comment('评论ip');
            $table->tinyInteger('read')->unsigned()->index()->default(0)->comment('是否已读');
            $table->tinyInteger('status')->unsigned()->index()->default(0)->comment('是否显示');
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
        Schema::dropIfExists('comments');
    }
}
