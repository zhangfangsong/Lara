<?php

/**
 * 节点模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $fillable = [
		'alias', 'name', 'pid', 'class_name', 'sidebar'
	];
	
	public function hasChild()
	{
		return self::where('pid', $this->id)->value('id');
	}

	public function users()
	{
		return $this->belongsToMany(Role::class);
	}
}
