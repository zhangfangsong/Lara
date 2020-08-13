<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->string('title')->index()->comment('标题');
            $table->text('content')->comment('内容');
            $table->bigInteger('user_id')->unsigned()->index()->comment('用户id');
            $table->bigInteger('category_id')->unsigned()->index()->comment('分类id');
            $table->string('keyword')->default('')->comment('关键词');
            $table->string('description')->default('')->comment('描述');
            $table->string('thumb')->default('')->comment('缩略图');
            $table->tinyInteger('status')->unsigned()->index()->default(1)->comment('是否显示');
            $table->integer('views')->unsigned()->default(0)->comment('浏览数');
            $table->integer('replies')->unsigned()->default(0)->comment('评论数');
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
        Schema::dropIfExists('posts');
    }
}
