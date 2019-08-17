
@extends('admin.layouts.main')

@section('title', '用户')

@section('stylesheet')
	<link href="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('script')
	<script src="{{ asset('assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
	<script src="{{ asset('assets/pages/jquery.bs-table.js') }}"></script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<h4 class="page-title">用户列表</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
				<li>
					<a href="{{ route('admin.link.index') }}">用户</a>
				</li>
				<li class="active">
					列表
				</li>
			</ol>
		</div>
	</div>

	<!--Basic Columns-->
	<div class="row">
		<div class="col-sm-12">

			@include('shared._errors')

			<div class="card-box">
				<div class="row">
	            	<div class="col-sm-4">
	            		 <a href="{{ route('admin.user.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
	            	</div>
				</div>

				<table data-toggle="table" class="table table-condensed mails">
					<thead>
						<tr>
							<th>ID</th>
							<th class="text-center">头像</th>
							<th>用户名</th>
							<th>邮箱</th>
							<th>角色</th>
							<th>注册时间</th>
							<th class="text-center">状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if(count($list))
					<tbody>
						@foreach($list as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td>
								<img src="{{ $val->avatar }}" alt="{{ $val->username }}" class="thumb-sm img-circle">
							</td>
							<td>{{ $val->username }}</td>
							<td>{{ $val->email }}</td>
							<td><span class="label label-table label-default">{{ $val->role->name }}</span></td>
							<td>{{ $val->created_at->diffForHumans() }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '正常' : '禁用' }}</span></td>
							<td>
								<a href="{{ route('admin.user.edit', $val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('admin.user.destroy', $val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5"><i class="fa fa-remove"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>

				@include('admin.shared._page')
			</div>
		</div>
	</div>
@stop