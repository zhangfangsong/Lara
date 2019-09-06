<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '关于我们',
                'alias' => 'about',
                'content' => '<p>关于我们的内容</p>',
                'keyword' => '关于我们',
                'description' => '关于我们的描述信息',
                'created_at' => '2019-09-04 14:58:53',
                'updated_at' => '2019-09-04 14:58:53',
            ),
        ));
    }
}