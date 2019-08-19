<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_role', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->integer('role_id')->unsigned()->index()->comment('角色id');
            $table->integer('node_id')->unsigned()->index()->comment('节点id');
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
        Schema::dropIfExists('node_role');
    }
}
