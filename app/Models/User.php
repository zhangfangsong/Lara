<?php

/**
 * 用户模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Route;
use App\Handlers\App;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable {
        notify as protected laraNotify;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'description', 'activation_token', 'activated', 'status', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token',
    ];

    public function notify($instance)
    {
        if($this->id == Auth::id()) {
            return ;
        }
        if(method_exists($instance, 'toDatabase')) {
            $this->increment('notification_count');
        }
        
        $this->laraNotify($instance);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }
    
    //用户评论
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //用户文章
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //用户角色
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //收藏的文章
    public function collections()
    {
        return $this->belongsToMany(Post::class, 'collections');
    }

    //是否拥有模型
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }
    
    //新增用户
    public static function add($info)
    {
        if(!is_array($info) || empty($info)){
            return false;
        }

        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'avatar' => '',
            'description' => '',
            'activation_token' => '',
            'activated' => 0,
            'status' => 1,
            'role_id' => 2
        ];

        foreach($data as $key => $val){
            if(isset($info[$key])){
                $data[$key] = $info[$key];
            }
        }
        
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }
        
        if(empty($data['avatar']) && $data['email']){
            $data['avatar'] = app(App::class)->getAvatarByEmail($data['email']);
        }
        
        return self::create($data);
    }

    //获取权限
    public function getAllPermissions()
    {
        if($this->id === 1) return Node::all();
        return $this->role->nodes;
    }

    //用户权限检测
    public function hasRight()
    {
        if($this->role_id == 1){
            return true;
        }
        if(in_array(Route::currentRouteName(), $this->role->getNodes())){
            return true;
        }
        return false;
    }
	
	// 获取用户菜单
	public function getNavs()
	{
		if($this->role_id == 1) {
			$navs = Node::where('sidebar', 1)->get();
		} else {
			$navs = $this->role->nodes()->where('sidebar', 1)->get();
		}
		return $navs;
	}
	
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
	
    public function getJWTCustomClaims()
    {
        return [];
    }
}