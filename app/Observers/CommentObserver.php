<?php

/**
 * 评论观察者
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Observers;

use App\Models\Comment;
use App\Notifications\PostCommented;

class CommentObserver
{
	public function created(Comment $comment)
	{
		$comment->post->updateReplyCount();

		//通知文章作者有新评论
		$comment->post->user->notify(new PostCommented($comment));
	}
	
	public function deleted(Comment $comment)
	{
		$comment->post->updateReplyCount();
	}
}