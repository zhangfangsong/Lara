<?php

/**
 * 文章分类模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name', 'description', 'url', 'pid', 'status', 'sort'
	];
	
	public function articles()
	{
		return $this->hasMany(Article::class);
	}

	public function getLinkUrl()
	{
		if(!empty($this->url)){
			return $this->url;
		}

		return route('category', $this->id);
	}

	public static function getAppCategory()
	{
		return self::where(['status'=> 1, 'pid'=> 0])->orderBy('sort', 'desc')->get();
	}

	public function hasChild()
	{
		return self::where('pid', $this->id)->value('id');
	}
}
