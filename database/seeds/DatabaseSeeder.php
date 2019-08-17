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
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            NodesTableSeeder::class,
            CategoriesTableSeeder::class,
            ArticlesTableSeeder::class,
            CommentsTableSeeder::class,
            LinksTableSeeder::class,
            TagsTableSeeder::class,
    		ConfigsTableSeeder::class,
    	]);
    }
}
