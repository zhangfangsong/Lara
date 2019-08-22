
@extends('admin.layouts.main')

@section('title', '分类')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($category) ? '编辑' : '新增' }}分类</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.category.index') }}">分类</a>
				</li>
				<li class="active">
				    {{ isset($category) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>
    
	<div class="row">
	    <div class="col-sm-12">
            @if(isset($category))
                <form class="form-horizontal" role="form" action="{{ route('admin.category.update', $category->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.category.store') }}" method="POST">
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
                                	<input type="text" class="form-control" name="name" placeholder="请输入分类名称" value="{{ $category->name or old('name') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">父级</label>
                                <div class="col-md-4">
                                	<select class="form-control" name="pid">
	                                   <option value="0">顶级分类</option>
                                       @if(count($list))
                                            @foreach($list as $val)
                                                <option @if(isset($category) && $category->pid == $val->id )selected @endif value="{{ $val->id }}">{{ str_repeat('&nbsp;', ($val->level-1)*4).$val->name }}</option>
                                            @endforeach
                                       @endif
	                                </select>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">链接</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="url" placeholder="请输入分类链接" value="{{ $category->url or old('url') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">描述</label>
                                <div class="col-md-6">
                                	<textarea name="description" class="form-control" rows="3" placeholder="请输入分类描述">{{ $category->description or old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">排序</label>
                                <div class="col-md-2">
                                	<input type="text" class="form-control" name="sort" placeholder="请输入分类排序" value="{{ $category->sort or old('sort') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">状态</label>

                                <div class="col-md-6">
                                	<div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($category->status) && $category->status == 1 ? 'checked' : '' }} name="status" checked>
	                                    <label for="inlineRadio1"> 显示 </label>
	                                </div>
	                                <div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($category->status) && $category->status == 0 ? 'checked' : '' }} name="status">
	                                    <label for="inlineRadio2"> 隐藏 </label>
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
