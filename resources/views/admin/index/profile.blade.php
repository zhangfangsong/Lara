
@extends('admin.layouts.main')

@section('title', '我的资料')

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
			<h4 class="page-title">我的资料</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">控制台</a>
				</li>
	            <li>
					<a href="{{ route('admin.dashboard.profile') }}">我的资料</a>
				</li>
				<li class="active">
					编辑
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.dashboard.profile') }}" method="POST">
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>我的资料</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">用户名</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="username" placeholder="请输入用户名" value="{{ Auth::user()->username }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">邮箱</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="email" placeholder="请输入邮箱" value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">头像</label>
                                <div class="col-md-10">
                                    <ul class="upload-wraper">
                                        @if(isset(Auth::user()->avatar) && Auth::user()->avatar)
                                            <li><img src="{{ Auth::user()->avatar }}" alt=""><input type="hidden" name="avatar" value="{{ Auth::user()->avatar }}"></li>
                                        @endif
                                    </ul>
                                    <a href="javascript:void(0)" data-id="avatar" data-num="one" class="btn btn-default J-ajax-upload">上传头像</a>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">简介</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" rows="3" placeholder="请输入简介">{{ Auth::user()->description }}</textarea>
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
