<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        User::add([
            'username' => 'demo',
            'email' => 'demo@admin.com',
            'password' => '123456',
            'activated' => 1,
            'status' => 1,
            'role_id' => 2
        ]);
    }
}