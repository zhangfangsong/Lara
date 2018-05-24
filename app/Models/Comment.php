<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'article_id', 'user_id', 'content', 'at_id', 'ip', 'status', 'is_new',
	];

	public function article()
	{
		return $this->belongsTo(Article::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function atUser()
	{
		return $this->belongsTo(User::class, 'at_id');
	}
}
