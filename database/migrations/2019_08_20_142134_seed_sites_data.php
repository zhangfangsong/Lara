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
    public function up()
    {
        $app = new App;
        
        $this->seedUsers($app);
        $this->seedSettings();
        $this->seedRoles();
        $this->seedLinks();
        $this->seedNodes();
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
        DB::table('nodes')->truncate();
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
        
        Role::create([
            'name' => '注册用户',
            'description' => '网站注册用户',
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
    
    //填充节点
    public function seedNodes()
    {
        \DB::table('nodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '控制台',
                'alias' => '控制台',
                'name' => 'admin.dashboard',
                'pid' => 0,
                'class_name' => 'ti-home',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:50:22',
                'updated_at' => '2019-09-04 12:50:22',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '管理',
                'alias' => '管理',
                'name' => 'admin.manage',
                'pid' => 0,
                'class_name' => 'ti-paint-bucket',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:51:10',
                'updated_at' => '2019-09-04 12:51:10',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => '设置',
                'alias' => '设置',
                'name' => 'admin.setting',
                'pid' => 0,
                'class_name' => 'ti-user',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:51:56',
                'updated_at' => '2019-09-04 12:51:56',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => '仪表盘',
                'alias' => '仪表盘',
                'name' => 'admin.dashboard.index',
                'pid' => 1,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:55:29',
                'updated_at' => '2019-09-04 12:55:29',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => '我的资料',
                'alias' => '我的资料',
                'name' => 'admin.dashboard.profile',
                'pid' => 1,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:56:54',
                'updated_at' => '2019-09-04 12:56:54',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => '修改密码',
                'alias' => '修改密码',
                'name' => 'admin.dashboard.repass',
                'pid' => 1,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 12:57:22',
                'updated_at' => '2019-09-04 12:57:22',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => '文章列表',
                'alias' => '文章',
                'name' => 'admin.post.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:02:03',
                'updated_at' => '2019-09-04 13:02:03',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => '分类列表',
                'alias' => '分类',
                'name' => 'admin.category.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:03:13',
                'updated_at' => '2019-09-04 13:03:13',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => '用户列表',
                'alias' => '用户',
                'name' => 'admin.user.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:04:04',
                'updated_at' => '2019-09-04 13:04:04',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => '角色列表',
                'alias' => '角色',
                'name' => 'admin.role.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:04:42',
                'updated_at' => '2019-09-04 13:04:42',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => '节点列表',
                'alias' => '节点',
                'name' => 'admin.node.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:05:25',
                'updated_at' => '2019-09-04 13:05:25',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => '评论列表',
                'alias' => '评论',
                'name' => 'admin.comment.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:06:06',
                'updated_at' => '2019-09-04 13:06:06',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => '标签列表',
                'alias' => '标签',
                'name' => 'admin.tag.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:06:34',
                'updated_at' => '2019-09-04 13:06:34',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => '页面列表',
                'alias' => '页面',
                'name' => 'admin.page.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:07:17',
                'updated_at' => '2019-09-04 13:07:17',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => '链接列表',
                'alias' => '链接',
                'name' => 'admin.link.index',
                'pid' => 2,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:07:45',
                'updated_at' => '2019-09-04 13:07:45',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => '全局',
                'alias' => '全局',
                'name' => 'admin.setting.main',
                'pid' => 3,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 13:11:25',
                'updated_at' => '2019-09-04 13:11:25',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => '上传',
                'alias' => '上传',
                'name' => 'admin.setting.upload',
                'pid' => 3,
                'class_name' => '',
                'sidebar' => 1,
                'created_at' => '2019-09-04 14:19:20',
                'updated_at' => '2019-09-04 14:19:20',
            ),
        ));
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
