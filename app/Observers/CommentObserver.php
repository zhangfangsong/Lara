<?php

/**
 * 评论观察者
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
	public function created(Comment $comment)
	{
		$comment->post->increment('replies');
	}

	public function deleted(Comment $comment)
	{
		$comment->post->decrement('replies');
	}
}



