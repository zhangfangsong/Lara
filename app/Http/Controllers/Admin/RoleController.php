<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends BaseController
{
	public function index()
	{
		$list = Role::paginate(20);
		return view('admin.role.index', ['list'=>$list]);
	}

	public function create()
	{
		return view('admin.role.create');
	}
}
