
@extends('admin.layouts.main')

@section('title', '角色')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">{{ isset($role) ? '编辑' : '新增' }}角色</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.role.index') }}">角色</a>
				</li>
				<li class="active">
				    {{ isset($role) ? '编辑' : '新增' }}
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            @if(isset($role))
                <form class="form-horizontal" role="form" action="{{ route('admin.role.update', $role->id) }}" method="POST">
                {{ method_field('PATCH') }}
            @else
                <form class="form-horizontal" role="form" action="{{ route('admin.role.store') }}" method="POST">
            @endif
            	{{ csrf_field() }}
                <input type="hidden" name="nodes" value="">

                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>基本信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">名称</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="name" placeholder="请输入角色名称" value="{{ $role->name or old('name') }}">
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">描述</label>
                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" rows="3" placeholder="请输入角色描述">{{ $role->description or old('description') }}</textarea>
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
