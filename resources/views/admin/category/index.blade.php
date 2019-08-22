
@extends('admin.layouts.main')

@section('title', '分类')

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
			<h4 class="page-title">分类列表</h4>
			<ol class="breadcrumb">
				<li>
					<a href="#">管理</a>
				</li>
				<li>
					<a href="{{ route('admin.category.index') }}">分类</a>
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
	            		 <a href="{{ route('admin.category.create') }}" class="btn btn-default waves-effect waves-light m-b-30"><i class="md md-add"></i> 新增</a>
	            	</div>
				</div>

				<table data-toggle="table" class="table table-condensed">
					<thead>
						<tr>
							<th>ID</th>
							<th>名称</th>
							<th data-width="25%">链接</th>
							<th class="text-center">排序</th>
							<th class="text-center">状态</th>
							<th class="text-center">操作</th>
						</tr>
					</thead>

					@if(count($list))
					<tbody>
						@foreach($list as $val)
						<tr>
							<td>{{ $val->id }}</td>
							<td>{{ str_repeat('&nbsp;', ($val->level-1)*6).$val->name }}</td>
							<td width="120">{{ $val->getLinkUrl() }}</td>
							<td>{{ $val->sort }}</td>
							<td><span class="label label-table {{ $val->status == 1 ? 'label-default' : 'label-warning' }}">{{ $val->status == 1 ? '显示' : '隐藏' }}</span></td>
							<td>
								<a href="{{ route('admin.category.edit', $val->id) }}" class="btn btn-default waves-effect waves-light btn-xs m-l-5"><i class="fa fa-pencil"></i></a>
								<a href="{{ route('admin.category.destroy', $val->id) }}" class="btn btn-danger waves-effect waves-light btn-xs m-l-5"><i class="fa fa-remove"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>
			</div>
		</div>
	</div>
@stop