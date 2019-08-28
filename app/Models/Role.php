<?php

/**
 * 角色模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'name', 'description'
	];

	//角色节点
	public function nodes()
	{
		return $this->belongsToMany(Node::class)->withTimestamps();
	}
	
	//角色节点名称
	public function getNodes()
	{
		$nodes = $this->nodes;

		$data = [];
		foreach($nodes as $node){
			$data[] = $node->name;
		}
		
		return $data;
	}
}
