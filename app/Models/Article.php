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
}
