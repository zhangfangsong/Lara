<?php

namespace App\Http\Controllers\Install;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Link;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use App\Models\Node;

class IndexController extends Controller
{
	public function index($model)
	{
		$model = ucfirst($model);

		switch ($model) {
			case 'Article':
				$list = Article::get()->toArray();
				break;

			case 'Category':
				$list = Category::get()->toArray();
				break;

			case 'Comment':
				$list = Comment::get()->toArray();
				break;

			case 'Config':
				$list = Config::get()->toArray();
				break;

			case 'Link':
				$list = Link::get()->toArray();
				break;

			case 'Role':
				$list = Role::get()->toArray();
				break;

			case 'Node':
				$list = Node::get()->toArray();
				break;

			case 'Tag':
				$list = Tag::get()->toArray();
				break;

			case 'User':
				$list = [];
				$users = User::orderBy('id', 'asc')->limit(2)->get();
				if($users->count()){
					foreach($users as $user){
						$list[] = $user->makeVisible(['password', 'remember_token'])->toArray();
					}
				}
				break;

			default:
				$list = [];
				break;
		}

		return json_encode($list, JSON_UNESCAPED_UNICODE);
	}
}
