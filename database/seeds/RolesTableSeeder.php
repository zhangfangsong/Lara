<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Handlers\Install;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = Install::getData('role');

    	Role::insert($roles);
    }
}
