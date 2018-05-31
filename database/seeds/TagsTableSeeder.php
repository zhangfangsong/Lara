<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Handlers\Install;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$tags = Install::getData('tag');
    	Tag::insert($tags);
    }
}
