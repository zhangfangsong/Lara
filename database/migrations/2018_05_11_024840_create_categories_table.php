<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->string('name')->comment('名称');
            $table->string('description')->default('')->comment('描述');
            $table->string('url')->default('')->comment('链接url');
            $table->bigInteger('pid')->unsigned()->index()->default(0)->comment('父级id');
            $table->tinyInteger('status')->unsigned()->index()->default(0)->comment('是否显示');
            $table->integer('sort')->unsigned()->index()->default(0)->comment('排序');
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
        Schema::dropIfExists('categories');
    }
}
