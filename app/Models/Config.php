<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Config extends Model
{
	protected $fillable = [
		'name', 'value', 'type', 'tab', 'sort'
	];

	public $timestamps = false;

	protected static $cache_key = 'lara:configs';

	protected static $expire_at = 120;

	public static function getAll($tab = '')
	{
		$list = Cache::remember(self::$cache_key, self::$expire_at, function (){
			return self::all();
		});

		if(empty($list)){
			return [];
		}

		$config = [];
		foreach($list as $key => $val){
			if($tab){
				if($val['tab'] == $tab){
					$config[$val['name']] = $val['value'];
				}
			}else{
				$config[$val['name']] = $val['value'];
			}
		}

		return $config;
	}

	public static function addOrUpdate($info, $tab)
	{
		if(!is_array($info) || empty($info)){
			return false;
		}

		foreach($info as $key => $val){
			$map = [
				'name' => $key
			];
			$config = self::where($map)->first();

			$data = [
				'name' => $key,
				'value' => $val
			];

			if(empty($config)){
				$data['tab'] = $tab;
				self::create($data);
			}else{
				self::where($map)->update($data);
			}
		}

		Cache::forget(self::$cache_key);

		return true;
	}
}
