<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->string('title')->comment('名称');
            $table->string('alias')->nullable()->comment('别名');
            $table->string('name')->unique()->comment('路由');
            $table->bigInteger('pid')->unsigned()->default(0)->comment('父级id');
            $table->string('class_name')->default('')->comment('类名');
            $table->tinyInteger('sidebar')->unsigned()->index()->default(0)->comment('是否侧边栏导航');
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
        Schema::dropIfExists('nodes');
    }
}
