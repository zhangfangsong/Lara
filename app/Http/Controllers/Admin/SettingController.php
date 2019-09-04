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
use App\Http\Requests\Admin\SettingRequest;

class SettingController extends BaseController
{
	//编辑配置界面
	public function index()
	{
		$tab = $this->action;

		$tabs = [
			'main' => '全局设置',
			'upload' => '上传设置',
		];
		$title = $tabs[$tab];
		
		$setting = (object)Setting::getAll($tab);
		
		return view('admin.setting.index', ['title'=> $title, 'tab'=> $tab, 'setting'=> $setting]);
	}
	
	//编辑配置操作
	public function store(SettingRequest $request)
	{
		$tab = $this->action;
		
		$data = $request->except('_token');
		Setting::addOrUpdate($data, $tab);
		
		return redirect()->back()->with('success', '编辑成功');
	}
}
