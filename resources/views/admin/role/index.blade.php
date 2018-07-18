
@extends('admin.layouts.main')

@section('title', '角色')

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
			<h4 class="page-title">角色列表</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
				<li>
					<a href="{{ route('admin.role.index') }}">角色</a>
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
	            		 <a href="{{ route('admin.role.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
	            	</div>
				</div>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>名称</th>
							<th>描述</th>
							<th class="text-center">权限</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if(count($list))
					<tbody>
						@foreach($list as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td><span class="label label-table label-default">{{ $val->name }}</span></td>
							<td>{{ $val->description }}</td>
							<td>
								<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on left" data-original-title="Tooltip on right">查看</button>
							</td>
							<td>
								<a href="{{ route('admin.role.nodes', $val->id) }}" class="btn btn-info waves-effect waves-light btn-xs m-l-5 {{ in_array($val->id, [1]) ? 'disabled' : '' }}"><i class="fa fa-user-plus"></i></a>
								<a href="{{ route('admin.role.edit', $val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5 {{ in_array($val->id, [1,2]) ? 'disabled' : '' }}"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('admin.role.destroy', $val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5 {{ in_array($val->id, [1,2]) ? 'disabled' : '' }}"><i class="fa fa-remove"></i></a>
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