<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $fillable = [
		'name', 'url', 'logo', 'sort', 'status', 'target',
	];

	public $timestamps = false;

	public static function getAll()
	{
		return self::where('status', 1)->orderBy('sort', 'desc')->get();
	}
}
