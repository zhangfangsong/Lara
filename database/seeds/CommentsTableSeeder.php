<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Handlers\Install;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$comments = Install::getData('comment');
    	Comment::insert($comments);
    }
}
