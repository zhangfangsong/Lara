
@extends('admin.layouts.main')

@section('title', '用户')

@section('stylesheet')
    <link href="{{ asset('uploader/webuploader.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
    <script src="{{ asset('uploader/webuploader.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($user) ? '编辑' : '新增' }}用户</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.user.index') }}">用户</a>
				</li>
				<li class="active">
				    {{ isset($user) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($user))
                <form class="form-horizontal" role="form" action="{{ route('admin.user.update', $user->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.user.store') }}" method="POST">
            @endif
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">用户名</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="username" placeholder="请输入用户名" value="{{ $user->username or old('username') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">邮箱</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="email" placeholder="请输入邮箱" value="{{ $user->email or old('email') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">密码</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password" placeholder="请输入密码" value="">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">头像</label>
                                <div class="col-md-10">
                                    <ul class="upload-wraper">
                                        @if(isset($user->avatar) && $user->avatar)
                                            <li><img src="{{ $user->avatar }}" alt=""><input type="hidden" name="avatar" value="{{ $user->avatar }}"></li>
                                        @endif
                                    </ul>
                                    <a href="javascript:void(0)" data-id="avatar" data-num="one" class="btn btn-default J-ajax-upload">上传头像</a>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">简介</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" rows="3" placeholder="请输入个人简介">{{ $user->description or old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">角色</label>
                                <div class="col-md-2">
                                    <select class="form-control" name="role_id">
                                       @foreach($roles as $val)
                                       <option @if(isset($user->role_id) && $user->role_id == $val->id) selected @endif value="{{ $val->id }}">{{ $val->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">状态</label>

                                <div class="col-md-6">
                                	<div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($user->status) && $user->status == 1 ? 'checked' : '' }} name="status" checked>
	                                    <label for="inlineRadio1"> 正常 </label>
	                                </div>
	                                <div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($user->status) && $user->status == 0 ? 'checked' : '' }} name="status">
	                                    <label for="inlineRadio2"> 禁用 </label>
	                                </div>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                            	<label class="col-md-2"></label>
                            	<div class="col-md-6">
                            		<button type="submit" class="btn w-sm btn-default waves-effect waves-light">保存</button>
                     				<button type="submit" class="btn w-sm btn-white waves-effect">取消</button>
                            	</div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
@stop
