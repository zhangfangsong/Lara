<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
	public function created(Comment $comment)
	{
		$comment->article->increment('comments');
	}

	public function deleted(Comment $comment)
	{
		$comment->article->decrement('comments');
	}
}



