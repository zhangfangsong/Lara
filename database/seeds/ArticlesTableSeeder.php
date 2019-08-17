<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Handlers\Install;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$articles = Install::getData('article');
    	Article::insert($articles);
    }
}
