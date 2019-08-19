<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('name')->comment('名称');
            $table->string('url')->comment('链接地址');
            $table->string('logo')->default('')->comment('链接图片');
            $table->integer('sort')->unsigned()->index()->default(0)->comment('排序');
            $table->tinyInteger('status')->unsigned()->index()->default(0)->comment('是否显示');
            $table->tinyInteger('target')->unsigned()->default(0)->comment('新窗口打开');
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
        Schema::dropIfExists('links');
    }
}
