<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends BaseController
{
	public function index()
	{
		$list = Comment::orderBy('id', 'desc')->paginate(20);
		return view('admin.comment.index', ['list'=>$list]);
	}

	public function edit(Comment $comment)
	{
		return view('admin.comment.create', ['comment'=> $comment]);
	}

	public function store(Request $request, Comment $comment)
	{

	}

	public function state(Comment $comment)
	{
		$status = $comment->status == 1 ? 0 : 1;
		$title = $status == 1 ? '显示' : '隐藏';
		$comment->update(['status'=> $status]);

		return redirect()->route()->with('success', $title.'成功');
	}

	public function destroy(Comment $comment)
	{
		$comment->delete();
		return redirect()->route('admin.comment.index')->with('success', '删除成功');
	}
}
