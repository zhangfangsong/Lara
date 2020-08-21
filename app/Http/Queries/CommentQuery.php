<?php

namespace App\Http\Queries;

use App\Models\Comment;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CommentQuery extends QueryBuilder
{
	public function __construct()
	{
		parent::__construct(Comment::query());
		
		$this->allowedIncludes('user', 'post', 'post.user');
	}
}
