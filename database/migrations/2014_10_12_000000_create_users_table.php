<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->comment('主键');
            $table->string('username')->unique()->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('avatar')->default('')->comment('头像');
            $table->string('description')->default('')->comment('用户简介');
            $table->rememberToken()->comment('记住密码');
            $table->tinyInteger('status')->unsigned()->index()->default(1)->comment('是否显示');
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
