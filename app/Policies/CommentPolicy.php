<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Comment $comment)
    {
        return $user->isAuthorOf($comment) || $user->isAuthorOf($comment->article);
    }
}
