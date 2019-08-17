<?php

namespace App\Transformers;

use App\Models\Tag;
use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
{
	public function transform(Tag $tag)
	{
		return [
			'id' => $tag->id,
			'name' => $tag->name,
			'article_count' => $tag->article_count
		];
	}
}
