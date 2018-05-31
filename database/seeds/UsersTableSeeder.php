<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Handlers\Install;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = Install::getData('user');
    	User::insert($users);
    }
}
