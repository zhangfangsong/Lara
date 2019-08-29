
@extends('admin.layouts.main')

@section('title', '角色')

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">权限</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
	            <li>
					<a href="{{ route('admin.role.index') }}">角色</a>
				</li>
				<li class="active">
                    权限
				</li>
			</ol>
		</div>
	</div>

	<div class="row">
	    <div class="col-sm-12">
            <form class="form-horizontal" role="form" action="{{ route('admin.role.assign', $role->id) }}" method="POST">
                {{ method_field('PATCH') }}
            	{{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12">

                    	@include('shared._errors')

                        <div class="card-box">
                            <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>权限信息</b></h5>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">角色</label>
                                <div class="col-md-4">
                                	<input type="text" class="form-control" name="name" value="{{ $role->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group m-b-20">
                                <label class="col-md-2 control-label">权限</label>
                                <div class="col-md-10">
                                    @foreach($list as $node)
                                    <p style="position: relative;margin-top: 8px;">
                                        {{ $node->title }} &nbsp;<input type="checkbox" name="nodes[]" @if(in_array($node->id, $data)) checked @endif value="{{ $node->id }}">
                                        <ul style="list-style-type: none;padding: 0;padding-left: 28px;">
                                            @if(isset($node->child))
                                            @foreach($node->child as $val)
                                            <li>{{ $val->title }} &nbsp;<input type="checkbox" class="nodes" name="nodes[]" @if(in_array($val->id, $data)) checked @endif value="{{ $val->id }}"></li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </p>
                                    @endforeach
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
