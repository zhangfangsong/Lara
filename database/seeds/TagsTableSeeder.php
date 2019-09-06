<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '谷歌',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:29:54',
                'updated_at' => '2019-09-04 14:29:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '手机',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:35:00',
                'updated_at' => '2019-09-04 14:35:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '教育',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:39:13',
                'updated_at' => '2019-09-04 14:39:13',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '苹果',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:43:24',
                'updated_at' => '2019-09-04 14:43:24',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '华为',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:43:24',
                'updated_at' => '2019-09-04 14:43:24',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '今日头条',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-04 14:45:34',
                'updated_at' => '2019-09-04 14:45:34',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '芯片',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:03:05',
                'updated_at' => '2019-09-06 14:03:05',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '阿里',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:05:15',
                'updated_at' => '2019-09-06 14:05:15',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '考拉',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:05:15',
                'updated_at' => '2019-09-06 14:05:15',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '特斯拉',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:06:44',
                'updated_at' => '2019-09-06 14:06:44',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Apple',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:08:24',
                'updated_at' => '2019-09-06 14:08:24',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Music',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:08:24',
                'updated_at' => '2019-09-06 14:08:24',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Facebook',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:10:35',
                'updated_at' => '2019-09-06 14:10:35',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '雷军',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:12:55',
                'updated_at' => '2019-09-06 14:12:55',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '董明珠',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:12:55',
                'updated_at' => '2019-09-06 14:12:55',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'B站',
                'views' => 0,
                'status' => 1,
                'created_at' => '2019-09-06 14:15:12',
                'updated_at' => '2019-09-06 14:15:12',
            ),
        ));
    }
}