<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            CategoriesTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            TagsTableSeeder::class,
            PagesTableSeeder::class,
    	]);
    }
}
