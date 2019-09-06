<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '科技',
                'description' => '科技分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:20:48',
                'updated_at' => '2019-09-04 14:20:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '生活',
                'description' => '生活分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:21:24',
                'updated_at' => '2019-09-04 14:21:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '创新',
                'description' => '创新分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:22:06',
                'updated_at' => '2019-09-04 14:22:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '汽车',
                'description' => '汽车分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:23:01',
                'updated_at' => '2019-09-04 14:23:01',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '职场',
                'description' => '职场分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:23:17',
                'updated_at' => '2019-09-04 14:23:17',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '财经',
                'description' => '财经分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:24:09',
                'updated_at' => '2019-09-04 14:24:09',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '房产',
                'description' => '房产分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:25:07',
                'updated_at' => '2019-09-04 14:25:07',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '其他',
                'description' => '其他分类',
                'url' => '',
                'pid' => 0,
                'status' => 1,
                'sort' => 0,
                'created_at' => '2019-09-04 14:25:21',
                'updated_at' => '2019-09-04 14:25:21',
            ),
        ));
    }
}