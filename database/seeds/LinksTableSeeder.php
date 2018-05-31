<?php

use Illuminate\Database\Seeder;
use App\Models\Link;
use App\Handlers\Install;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$links = Install::getData('link');
    	Link::insert($links);
    }
}
