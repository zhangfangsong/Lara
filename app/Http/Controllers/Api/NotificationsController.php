<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationsController extends BaseController
{
	public function index(Request $request)
	{
		$notifications = $request->user()->notifications()->paginate();
		return NotificationResource::collection($notifications);
	}
}
