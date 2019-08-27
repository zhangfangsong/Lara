<?php

/**
 * 评论模型
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'post_id', 'user_id', 'content', 'at_id', 'ip', 'read', 'status',
	];
	
	//所属文章
	public function post()
	{
		return $this->belongsTo(Post::class);
	}
	
	//所属用户
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	//回复评论
	public function atComment()
	{
		return $this->hasOne(Comment::class, 'at_id', 'id');
	}
	
	//最新评论
	public static function getRecent($limit = 10)
	{
		return self::where('status', 1)->orderBy('id', 'desc')->limit($limit)->get();
	}
}
