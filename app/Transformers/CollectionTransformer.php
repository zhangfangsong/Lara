<?php

namespace App\Transformers;

use App\Models\Collection;
use League\Fractal\TransformerAbstract;

class CollectionTransformer extends TransformerAbstract
{
	public function transform(Collection $collection)
	{
		return [
			'id' => $collection->id,
			'article_id' => $collection->article_id,
			'user_id' => $collection->user_id,
			'created_at' => $collection->created_at->toDateTimeString(),
			'updated_at' => $collection->updated_at->toDateTimeString(),
		];
	}
}
