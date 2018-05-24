<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Http\Requests\Admin\ConfigRequest;

class ConfigController extends BaseController
{
	public function index($tab)
	{
		$tab_arr = [
			'main' => '全局设置',
			'upload' => '上传设置',
		];

		$title = $tab_arr[$tab];

		$config = (object)Config::getAll($tab);

		return view('admin.config.index', ['title'=> $title, 'tab'=> $tab, 'config'=> $config]);
	}

	public function store(ConfigRequest $request, $tab)
	{
		$data = $request->except('_token');
		Config::addOrUpdate($data, $tab);

		return redirect()->back()->with('success', '编辑成功');
	}
}
