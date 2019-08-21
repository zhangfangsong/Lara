<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\User;
use App\Models\Role;
use App\Models\Link;
use App\Handlers\App;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SeedSitesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(App $app)
    {
        $this->seedUsers($app);
        $this->seedSettings();
        $this->seedRoles();
        $this->seedLinks();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('links')->truncate();
        DB::table('settings')->truncate();
    }
    
    //填充用户
    public function seedUsers($app)
    {
        $email = 'admin@admin.com';
        
        User::create([
            'username' => 'admin',
            'email' => $email,
            'password' => bcrypt('123456'),
            'avatar' => $app->getAvatarByEmail($email),
            'status' => 1,
            'role_id' => 1
        ]);
    }
    
    //填充角色
    public function seedRoles()
    {
        Role::create([
            'name' => '创始人',
            'description' => '网站创始人',
        ]);
    }

    //填充友链
    public function seedLinks()
    {
        Link::create([
            'name' => 'Lara博客',
            'url' => 'http://lara.zfsphp.com',
            'status' => 1
        ]);
    }

    //填充系统配置
    public function seedSettings()
    {
        Setting::create(['name' => 'name', 'value' => 'Lara博客系统']);
        Setting::create(['name' => 'title', 'value' => 'Lara博客系统']);
        Setting::create(['name' => 'keyword', 'value' => 'Lara,博客,Laravel,Laravel博客']);
        Setting::create(['name' => 'description', 'value' => '一款基于Laravel 5.5 开发的博客系统']);
        Setting::create(['name' => 'status', 'value' => '1']);
        Setting::create(['name' => 'icp', 'value' => '浙ICP备16000810号-2']);
        Setting::create(['name' => 'code', 'value' => '']);
        Setting::create(['name' => 'upload_size', 'value' => '2M', 'type' => 'upload']);
        Setting::create(['name' => 'upload_type', 'value' => 'png,jpg,jpeg,gif', 'type' => 'upload']);
    }
}
