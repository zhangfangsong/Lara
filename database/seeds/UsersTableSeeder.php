<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'username' => 'demo',
                'email' => 'demo@admin.com',
                'password' => '$2y$10$zF5BoDinslt595bgoQBf/.HJS3Fw5iUDtkewLGdF75voHNdXOMVnq',
                'avatar' => 'http://lara.zfsphp.com/uploads/images/avatar/201909/1567608685.jpg',
                'description' => '',
                'remember_token' => '75IPje1sn4DPgtKfLVcipFcG7UnZFBvrHLuR21mx4kgWzIdETwZBx0jklGXW',
                'status' => 1,
                'role_id' => 2,
                'created_at' => '2019-09-04 14:51:29',
                'updated_at' => '2019-09-04 14:51:29',
            ),
        ));
    }
}