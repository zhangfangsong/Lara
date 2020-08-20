<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $user->isAuthorOf($post);
    }
    
    public function destroy(User $user, Post $post)
    {
        return $user->isAuthorOf($post);
    }
}
