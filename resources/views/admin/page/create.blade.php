@extends('admin.layouts.main')
@section('title', '页面')

@section('stylesheet')
	<link href="{{ asset('editor/css/editormd.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
    <script src="{{ asset('editor/js/editormd.js') }}"></script>
	
    <script type="text/javascript">
		$(function() {
			var editor = editormd('content', {
				width: '100%',
				height: 400,
				markdown : "",
				path : "/editor/lib/",
				imageUpload : true,
		        imageFormats : ["jpg", "jpeg", "gif", "png"],
		        imageUploadURL : Lara.ImgUploadUrl,
			})
			$('.editormd-preview-close-btn').css('display', 'none')
		})
    </script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($page) ? '编辑' : '新增' }}页面</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.page.index') }}">页面</a>
				</li>
				<li class="active">
				    {{ isset($page) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($page))
                <form class="form-horizontal" role="form" action="{{ route('admin.page.update', $page->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.page.store') }}" method="POST">
            @endif
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">标题</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="title" placeholder="请输入标题" value="{{ $page->title ?? old('title') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">别名</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="alias" placeholder="请输入别名" value="{{ $page->alias ?? old('alias') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">内容</label>
                                <div class="col-md-10">
                                    <div id="content">
										<textarea style="display: none;" name="content">{{ $page->content ?? '' }}</textarea>
									</div>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">关键词</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="keyword" placeholder="请输入关键词" value="{{ $page->keyword ?? old('keyword') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">描述</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" rows="3" placeholder="请输入描述">{{ $page->description ?? old('description') }}</textarea>
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