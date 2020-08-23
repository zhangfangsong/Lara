<?php

namespace App\Http\Queries;

use App\Models\Post;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PostQuery extends QueryBuilder
{
	public function __construct()
	{
		parent::__construct(Post::query());

		$this->allowedIncludes('user', 'category', 'user.role')
			->allowedFilters([
				'title',
				AllowedFilter::exact('category_id'),
				AllowedFilter::scope('withOrder')->default('recent')
			]);
	}
}