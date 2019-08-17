<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Handlers\Install;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = Install::getData('category');
    	Category::insert($categories);
    }
}
