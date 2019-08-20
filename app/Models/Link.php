<?php

/**
 * 友链模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $fillable = [
		'name', 'url', 'logo', 'sort', 'status', 'target'
	];
	
	//获取友链
	public static function getAll()
	{
		return self::where('status', 1)->orderBy('sort', 'desc')->get();
	}
}
