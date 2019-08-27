<?php

/**
 * 评论控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends BaseController
{
	//评论列表
	public function index()
	{
		$list = Comment::where('at_id', 0)->orderBy('id', 'desc')->paginate(20);
		return view('admin.comment.index', ['list'=>$list]);
	}
	
	//评论详情
	public function edit(Comment $comment)
	{
		return view('admin.comment.create', ['comment'=> $comment]);
	}
	
	//评论回复
	public function reply(CommentRequest $request, Comment $comment)
	{
		Comment::create([
			'post_id' => $comment->post_id,
			'user_id' => Auth::id(),
			'content' => $request->content,
			'at_id' => $comment->id,
			'ip' => $request->getClientIp(),
			'read' => 1,
			'status' => 1,
		]);

		return redirect()->back()->with('success', '回复成功');
	}

	//删除评论
	public function destroy(Comment $comment)
	{
		$comment->delete();

		return redirect()->back()->with('success', '删除成功');
	}
}
