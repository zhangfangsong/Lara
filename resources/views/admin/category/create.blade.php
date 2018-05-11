
@extends('admin.layouts.main')

@section('title', '分类')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">新增分类</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">WeBlog</a>
				</li>
	            <li>
					<a href="#">分类</a>
				</li>
				<li class="active">
					新增
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.category.store') }}" method="POST">
            	{{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">名称</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="name" placeholder="请输入分类名称" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">父级</label>
                                <div class="col-md-4">
                                	<select class="form-control" name="pid">
	                                    <option value="0">请选择</option>
	                                    <option value="1">分类一</option>
	                                </select>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">描述</label>
                                <div class="col-md-6">
                                	<textarea name="description" class="form-control" rows="3" placeholder="请输入分类描述">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">排序</label>
                                <div class="col-md-2">
                                	<input type="text" class="form-control" name="sort" placeholder="请输入分类排序" value="{{ old('sort') or 0 }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">状态</label>

                                <div class="col-md-6">
                                	<div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio1" value="1" name="status" checked>
	                                    <label for="inlineRadio1"> 显示 </label>
	                                </div>
	                                <div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio2" value="0" name="status">
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
