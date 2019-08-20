<?php

/**
 * 系统配置模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
	protected $fillable = [
		'name', 'value', 'type'
	];

	protected static $cache_key = 'lara:settings';

	protected static $expire_at = 120;

	//获取系统配置
	public static function getAll($type = '')
	{
		$list = Cache::remember(self::$cache_key, self::$expire_at, function (){
			return self::all();
		});

		if(empty($list)){
			return [];
		}

		$settings = [];
		foreach($list as $key => $val){
			if($type){
				if($val['type'] == $type){
					$settings[$val['name']] = $val['value'];
				}
			}else{
				$settings[$val['name']] = $val['value'];
			}
		}
		
		return $settings;
	}
	
	//更新配置
	public static function addOrUpdate($info, $type = 'main')
	{
		if(!is_array($info) || empty($info)){
			return false;
		}

		foreach($info as $key => $val){
			$setting = self::where('name', $key)->first();

			$data = [
				'name' => $key,
				'value' => $val
			];

			if(empty($setting)){
				$data['type'] = $type;
				self::create($data);
			}else{
				$setting->update($data);
			}
		}
		
		Cache::forget(self::$cache_key);
		
		return true;
	}
}
