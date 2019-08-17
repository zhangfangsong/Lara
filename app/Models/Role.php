<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'name', 'nodes', 'description',
	];

	public $timestamps = false;

	public function node()
	{
		return $this->belongsToMany(Node::class);
	}

	public function getNodes()
	{
		$nodes = $this->node;
		$data = [];
		foreach($nodes as $node){
			$data[] = $node->name;
		}

		return $data;
	}
}
