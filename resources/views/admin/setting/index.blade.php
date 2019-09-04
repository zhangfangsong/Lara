
@extends('admin.layouts.main')

@section('title', $title)

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ $title }}</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">设置</a>
				</li>
	            <li>
					<a href="{{ route($route) }}">{{ $title }}</a>
				</li>
				<li class="active">
					编辑
				</li>
			</ol>
		</div>
	</div>
    
	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route($route) }}" method="POST">
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        
                    	@include('shared._errors')
                        
                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>{{ $title }}</b></h5>
                            @if($tab == 'main')
                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">名称</label>
                                    <div class="col-md-4">
                                    	<input type="text" class="form-control" name="name" placeholder="站点名称" value="{{ $setting->name or '' }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">标题</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="title" placeholder="站点标题" value="{{ $setting->title or '' }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">关键词</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="keyword" placeholder="关键词" value="{{ $setting->keyword or '' }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">描述</label>
                                    <div class="col-md-6">
                                        <textarea name="description" class="form-control" rows="3" placeholder="描述">{{ $setting->description or '' }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="m-b-15 col-md-2 control-label">开启</label>

                                    <div class="col-md-6">
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio1" value="1" {{ isset($setting->status) && $setting->status == 1 ? 'checked' : '' }} name="status" checked>
                                            <label for="inlineRadio1"> 是 </label>
                                        </div>
                                        <div class="radio radio-inline">
                                            <input type="radio" id="inlineRadio2" value="0" {{ isset($setting->status) && $setting->status == 0 ? 'checked' : '' }} name="status">
                                            <label for="inlineRadio2"> 否 </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">备案</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="icp" placeholder="ICP备案号" value="{{ $setting->icp or '' }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">代码</label>
                                    <div class="col-md-6">
                                        <textarea name="code" class="form-control" rows="3" placeholder="统计代码">{{ $setting->code or '' }}</textarea>
                                    </div>
                                </div>
                            @elseif($tab == 'upload')
                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">图片大小</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="upload_size" placeholder="上传图片大小" value="{{ $setting->upload_size or '2M' }}">
                                    </div>
                                </div>

                                <div class="form-group m-b-20">
                                    <label class="col-md-2 control-label">图片格式</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="upload_type" placeholder="上传图片类型" value="{{ $setting->upload_type or '' }}">
                                    </div>
                                </div>
                            @endif
                            
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
