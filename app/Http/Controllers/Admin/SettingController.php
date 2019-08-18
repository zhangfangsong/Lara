<?php

/**
 * 配置控制器
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\ConfigRequest;

class SettingController extends BaseController
{
	public function index($tab)
	{
		$tab_arr = [
			'main' => '全局设置',
			'upload' => '上传设置',
		];

		$title = $tab_arr[$tab];
		
		$config = (object)Setting::getAll($tab);
		
		return view('admin.setting.index', ['title'=> $title, 'tab'=> $tab, 'config'=> $config]);
	}
	
	public function store(ConfigRequest $request, $tab)
	{
		$data = $request->except('_token');
		Setting::addOrUpdate($data, $tab);

		return redirect()->back()->with('success', '编辑成功');
	}
}
