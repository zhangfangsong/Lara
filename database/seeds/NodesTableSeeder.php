<?php

use Illuminate\Database\Seeder;
use App\Models\Node;
use App\Handlers\Install;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nodes = Install::getData('node');
    	Node::insert($nodes);
    }
}
