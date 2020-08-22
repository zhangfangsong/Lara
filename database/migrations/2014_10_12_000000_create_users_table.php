<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('主键');
            $table->string('username')->unique()->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('avatar')->default('')->comment('头像');
            $table->string('description')->default('')->comment('用户简介');
            $table->integer('notification_count')->unsigned()->default(0)->comment('消息数');
            $table->string('activation_token')->default('')->comment('激活Token');
            $table->tinyInteger('activated')->unsigned()->index()->default(0)->comment('激活状态');
            $table->rememberToken()->comment('记住密码');
            $table->tinyInteger('status')->unsigned()->index()->default(1)->comment('显示状态');
            $table->tinyInteger('role_id')->unsigned()->index()->default(2)->comment('角色id');
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
        Schema::dropIfExists('users');
    }
}
