<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name', 'views', 'status',
	];

	public static function getByName($name)
	{
		return self::where(['name'=> $name])->first();
	}

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

	public static function getHot($limit = 20)
	{
		return self::where('status', 1)->orderBy('views', 'desc')->limit($limit)->get();
	}

	public function getLinkUrl()
	{
		return route('tag', $this->name);
	}

	public function getFontSize()
	{
		$size = (1200 + $this->views)/100;
		return $size > 30 ? 30 : $size;
	}

}
