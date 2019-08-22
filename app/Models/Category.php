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
	
	//分类文章
	public function posts()
	{
		return $this->hasMany(Post::class);
	}
	
	//获取分类链接
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

	//获取子级分类id
	public function hasChild()
	{
		return self::where('pid', $this->id)->value('id');
	}
}
