<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'post_id' => 1,
                'user_id' => 2,
                'content' => '又遭遇反垄断调查啊',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:55:09',
                'updated_at' => '2019-09-04 14:55:09',
            ),
            1 => 
            array (
                'id' => 2,
                'post_id' => 2,
                'user_id' => 2,
                'content' => '喜欢苹果手机系统😂',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:55:57',
                'updated_at' => '2019-09-04 14:55:57',
            ),
            2 => 
            array (
                'id' => 3,
                'post_id' => 3,
                'user_id' => 2,
                'content' => '好严啊，哎',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:56:35',
                'updated_at' => '2019-09-04 14:56:35',
            ),
            3 => 
            array (
                'id' => 4,
                'post_id' => 4,
                'user_id' => 2,
                'content' => '不错的手机额，哈哈哈。。。',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:57:03',
                'updated_at' => '2019-09-04 14:57:03',
            ),
            4 => 
            array (
                'id' => 5,
                'post_id' => 5,
                'user_id' => 2,
                'content' => '今日头条不错的，哈哈哈。。。',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:57:31',
                'updated_at' => '2019-09-04 14:57:31',
            ),
            5 => 
            array (
                'id' => 6,
                'post_id' => 5,
                'user_id' => 1,
                'content' => '觉得这款app挺好用的，哈哈哈。。。',
                'at_id' => 0,
                'ip' => '112.10.84.174',
                'read' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 15:00:30',
                'updated_at' => '2019-09-04 15:00:30',
            ),
        ));
    }
}