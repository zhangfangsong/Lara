<?php

use Illuminate\Database\Seeder;
use App\Models\Config;
use App\Handlers\Install;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$configs = Install::getData('config');
    	Config::insert($configs);
    }
}
