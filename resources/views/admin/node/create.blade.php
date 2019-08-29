
@extends('admin.layouts.main')

@section('title', '节点')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($node) ? '编辑' : '新增' }}节点</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.node.index') }}">节点</a>
				</li>
				<li class="active">
				    {{ isset($node) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($node))
                <form class="form-horizontal" role="form" action="{{ route('admin.node.update', $node->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.node.store') }}" method="POST">
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
                                    <input type="text" class="form-control" name="title" placeholder="请输入节点名称" value="{{ $node->title or old('title') }}">
                                </div>
                            </div>
                            
                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">别名</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="alias" placeholder="请输入节点别名" value="{{ $node->alias or old('alias') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">路由</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name" placeholder="请输入节点路由" value="{{ $node->name or old('name') }}">
                                </div>
                            </div>
                            
                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">父级</label>
                                <div class="col-md-4">
                                	<select class="form-control" name="pid">
	                                   <option value="0">顶级节点</option>
                                       @if(count($list))
                                            @foreach($list as $val)
                                                <option @if(isset($node) && $node->pid == $val->id )selected @endif value="{{ $val->id }}">{{ str_repeat('&nbsp;', ($val->level-1)*4).$val->title }}</option>
                                            @endforeach
                                       @endif
	                                </select>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">类名</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="class_name" placeholder="请输入CSS样式类" value="{{ $node->class_name or old('class_name') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="m-b-15 col-md-2 control-label">状态</label>

                                <div class="col-md-6">
                                	<div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio1" value="1" {{ isset($node->sidebar) && $node->sidebar == 1 ? 'checked' : '' }} name="sidebar" checked>
	                                    <label for="inlineRadio1"> 显示 </label>
	                                </div>
	                                <div class="radio radio-inline">
	                                    <input type="radio" id="inlineRadio2" value="0" {{ isset($node->sidebar) && $node->sidebar == 0 ? 'checked' : '' }} name="sidebar">
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
