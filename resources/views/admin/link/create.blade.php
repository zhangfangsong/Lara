
@extends('admin.layouts.main')

@section('title', '链接')

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
			<h4 class="page-title">{{ isset($link) ? '编辑' : '新增' }}链接</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.link.index') }}">链接</a>
				</li>
				<li class="active">
				    {{ isset($link) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($link))
                <form class="form-horizontal" role="form" action="{{ route('admin.link.update', $link->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.link.store') }}" method="POST">
            @endif
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">名称</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="name" placeholder="请输入链接名称" value="{{ $link->name or old('name') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">链接</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="url" placeholder="请输入链接Url" value="{{ $link->url or old('url') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">Logo</label>
                                <div class="col-md-10">
                                    <ul class="upload-wraper">
                                        @if(isset($link->logo) && $link->logo)
                                            <li><img src="{{ $link->logo }}" alt=""><input type="hidden" name="logo" value="{{ $link->logo }}"></li>
                                        @endif
                                    </ul>
                                    <a href="javascript:void(0)" data-id="logo" data-num="one" class="btn btn-default J-ajax-upload">上传图片</a>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">排序</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="sort" placeholder="请输入排序" value="{{ $link->sort or 0 }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">状态</label>

                                <div class="col-md-6">
                                	<div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($link->status) && $link->status == 1 ? 'checked' : '' }} name="status" checked>
	                                    <label for="inlineRadio1"> 显示 </label>
	                                </div>
	                                <div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($link->status) && $link->status == 0 ? 'checked' : '' }} name="status">
	                                    <label for="inlineRadio2"> 隐藏 </label>
	                                </div>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">新窗口打开</label>

                                <div class="col-md-6">
                                    <div class="radio radio-inline">
                                        <input type="radio" id="target1" value="1" {{ isset($link->target) && $link->target == 1 ? 'checked' : '' }} name="target" checked>
                                        <label for="target1"> 是 </label>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="radio radio-inline">
                                        <input type="radio" id="target2" value="0" {{ isset($link->target) && $link->target == 0 ? 'checked' : '' }} name="target">
                                        <label for="target2"> 否 </label>
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
