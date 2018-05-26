<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
            [
                'name' => '创始人',
                'nodes' => 'all',
                'description' => '网站创始人',
            ],
            [
                'name' => '注册用户',
                'nodes' => '',
                'description' => '注册用户',
            ],
        ];

    	Role::insert($roles);
    }
}
