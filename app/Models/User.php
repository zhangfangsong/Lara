<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
            'status' => 0,
            'role_id' => 0
        ];

        foreach($info as $key => $val){
            if(isset($data[$key])){
                $data[$key] = $val;
            }
        }

        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }

        return self::create($data);
    }
}
