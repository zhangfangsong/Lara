<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Route;
use App\Handlers\App;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar', 'description', 'status', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function atComments()
    {
        return $this->hasMany(Comment::class, 'at_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Article::class, 'collections');
    }

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

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
            'remember_token' => '',
            'status' => 1,
            'role_id' => 2
        ];

        foreach($info as $key => $val){
            if(isset($data[$key])){
                $data[$key] = $val;
            }
        }

        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }

        if(empty($data['avatar']) && $data['email']){
            $data['avatar'] = app(App::class)->getAvatarByEmail($data['email']);
        }

        return self::create($data);
    }

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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
