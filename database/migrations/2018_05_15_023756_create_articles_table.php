<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('content');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->string('keyword')->default('');
            $table->string('description')->default('');
            $table->integer('status')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->integer('comments')->unsigned()->default(0);
            $table->string('thumb')->default('');
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
        Schema::dropIfExists('articles');
    }
}
