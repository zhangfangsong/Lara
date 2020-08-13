<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id')->comment('主键');
            $table->bigInteger('role_id')->unsigned()->index()->comment('角色id');
            $table->bigInteger('node_id')->unsigned()->index()->comment('节点id');
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
