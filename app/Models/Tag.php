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
}
