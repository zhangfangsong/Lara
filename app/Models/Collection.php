<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $fillable = ['article_id', 'user_id'];

	public static function getOne($user_id, $article_id)
	{
		$map = [
			'article_id' => $article_id,
			'user_id' => $user_id,
		];

		return self::where($map)->first();
	}
}
