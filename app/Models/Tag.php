<?php

/**
 * 标签模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name', 'views', 'status',
	];

	//根据标签名获取一条标签
	public static function getByName($name)
	{
		return self::where(['name'=> $name])->first();
	}

	//新增标签
	public static function add($info)
	{
		if(empty($info)){
			return false;
		}

		$data = [
			'name' => '',
			'status' => 1
		];

		foreach($data as $key => $val){
			if(isset($info[$key])){
				$data[$key] = $info[$key];
			}
		}
		
		return self::create($data);
	}

	//热门标签
	public static function getHot($limit = 20)
	{
		return self::where('status', 1)->orderBy('views', 'desc')->limit($limit)->get();
	}
	
	//标签链接
	public function getLinkUrl()
	{
		return route('tag', $this->name);
	}

	//标签字体大小
	public function getFontSize()
	{
		$size = (1200 + $this->views)/100;
		return $size > 30 ? 30 : $size;
	}
}
