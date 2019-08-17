<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $fillable = [
		'name', 'title', 'description', 'class_name', 'sidebar', 'pid', 'alias',
	];

	public function hasChild()
	{
		return self::where('pid', $this->id)->value('id');
	}

	public function users()
	{
		return $this->belongsToMany(Role::class);
	}
}
