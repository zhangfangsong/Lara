<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Handlers\Level;

class Article extends Model
{
	protected $fillable = [
		'title', 'content', 'user_id' ,'category_id', 'keyword', 'description', 'status', 'views', 'thumb',
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function getLinkUrl()
	{
		return route('article', $this->id);
	}

	public static function getRecent($limit = 10)
	{
		return self::where('status', 1)->orderBy('id', 'desc')->limit($limit)->get();
	}

	public static function getHot($limit = 10)
	{
		return self::where('status', 1)->orderBy('views', 'desc')->limit($limit)->get();
	}

	public function getPrev()
	{
		$category_ids = $this->getChildArr($this->category_id);
		$article = self::where('status', 1)->where('id','<',$this->id)->whereIn('category_id', $category_ids)->orderBy('id','desc')->first();

		if($article){
			return '<a href="'.$this->getLinkUrl().'">'.$this->title.'</a>';
		}

		return '没有了';
	}

	public function getNext()
	{
		$category_ids = $this->getChildArr($this->category_id);
		$article = self::where('status', 1)->where('id','>',$this->id)->whereIn('category_id', $category_ids)->orderBy('id','asc')->first();

		if($article){
			return '<a href="'.$this->getLinkUrl().'">'.$this->title.'</a>';
		}

		return '没有了';
	}

	public function getChildArr($category_id)
	{
		static $childs_id_arr = [];

		if(empty($childs_id_arr)){
			$categorys = Category::all();
			$level = new Level;
			$childs_id_arr = $level->formatChild($categorys, $category_id);
		}

		return $childs_id_arr;
	}
}
