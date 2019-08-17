<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
			'id' => $user->id,
			'username' => $user->username,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'description' => $user->description,
			'postComment' => $user->status ? true : false,
			'role' => $user->role->name,
			'created_at' => $user->created_at->toDateTimeString(),
			'updated_at' => $user->updated_at->toDateTimeString(),
		];
	}
}
