<?php

/**
 * 单页模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = [
		'title', 'alias', 'content', 'keyword', 'description'
	];
}
