<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
		'title', 'content', 'user_id' ,'category_id', 'keyword', 'description', 'status', 'views', 'thumb',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function getLinkUrl()
	{
		return route('article', $this->id);
	}

	public static function getRecent($limit = 10)
	{
		return self::where('status', 1)->orderBy('id', 'desc')->limit($limit)->get();
	}

	public static function getHot($limit = 10)
	{
		return self::where('status', 1)->orderBy('views', 'desc')->limit($limit)->get();
	}

}
