<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationsController extends BaseController
{
	//通知列表
	public function index(Request $request)
	{
		$notifications = $request->user()->notifications()->paginate();
		return NotificationResource::collection($notifications);
	}

	//通知统计
	public function stats(Request $request)
	{
		return response()->json([
			'unread_count' => $request->user()->notification_count
		]);
	}
	
	//标为已读
	public function read(Request $request)
	{
		$request->user()->markAsRead();
		return response(null, 204);
	}
}